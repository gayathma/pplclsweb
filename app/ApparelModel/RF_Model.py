__author__ = 'Pathum'

import pandas as pd
import pymysql
import numpy as np
from numpy import genfromtxt, savetxt
import sys


# Connect to the database
mysql_cn = pymysql.connect(host='localhost',
                             user='root',
                             password='',
                             db='pplcls')

df_mysql = pd.read_sql('select f.*,'
                       'e.age,e.working_experience_current,e.dim_hrole_id,e.working_experience_previous,e.dim_hqualifications_id,e.is_pmp_certified,e.grade,'
                       'p.type,p.project_value '
                       ' from fact_knowledgebase_apparel f '
                       'inner join dim_hemployee_apparel e on e.id = f.dim_hemployee_id '
                       'inner join dim_hproject_apparel p on p.id = f.dim_hproject_id;', con=mysql_cn)
col_names = df_mysql.columns.tolist()

#print "Column names:"
#print col_names

# Isolate target data
predicted_result = df_mysql['is_suitable']
y = predicted_result

# Don't need these columns
to_drop = ['id','dim_hemployee_id','dim_hproject_id','is_suitable','type','start_date','estimated_end_date','actual_end_date','created_at','updated_at']
predict_feat_space = df_mysql.drop(to_drop,axis=1)

# Pull out features for future use
features = predict_feat_space.columns
#print features

X = predict_feat_space.as_matrix().astype(np.float)
savetxt('processed.csv', X, delimiter=',',
            header='', comments = '')

# This is important
from sklearn.preprocessing import StandardScaler
scaler = StandardScaler()
X = scaler.fit_transform(X)


#print "Feature space holds %d observations and %d features" % X.shape
#print "Unique target labels:", np.unique(y)

from sklearn.cross_validation import KFold

def run_prob_cv(X, y, clf_class, **kwargs):
    kf = KFold(len(y), n_folds=5, shuffle=True)
    y_prob = np.zeros((len(y),2))
    #dict = {}
    for train_index, test_index in kf:
        X_train, X_test = X[train_index], X[test_index]
        y_train = y[train_index]
        clf = clf_class(**kwargs)
        clf.fit(X_train,y_train)
        # Predict probabilities, not classes
        y_prob[test_index] = clf.predict_proba(X_test)
        #dict['']=clf.predict_proba(X_test)
    return y_prob

from sklearn.ensemble import RandomForestClassifier as RF
import warnings
warnings.filterwarnings('ignore')

# Use 10 estimators so predictions are all multiples of 0.1
pred_prob = run_prob_cv(X, y, RF,  n_estimators=10)
pred_selected = pred_prob[:,1]
is_selected = y == 1

# Number of times a predicted probability is assigned to an observation
counts = pd.value_counts(pred_selected)


# calculate true probabilities
true_prob = {}
for prob in counts.index:
    true_prob[prob] = np.mean(is_selected[pred_selected == prob])
    true_prob = pd.Series(true_prob)

# pandas-fu
counts = pd.concat([counts,true_prob], axis=1).reset_index()
counts.columns = ['pred_prob', 'count', 'true_prob']

employee = df_mysql['id']
em =  employee.tolist()

e = pred_selected.tolist()
#print e

# prepare a cursor object using cursor() method
cursor = mysql_cn.cursor()
project_id = int(sys.argv[1])


for num in range(0,len(em)):
    # execute the SQL query to find a record exist or not
    cursor.execute("SELECT * FROM predictionapparel WHERE project_id=%d AND employee_id=%d "
                   %(project_id,em[num]))
    # count results and if result exist update the record otherwise insert
    if (cursor.rowcount == 0):
        try:
            cursor.execute("INSERT INTO predictionapparel (project_id, employee_id) VALUES (%d,%d)"
                           %(project_id, em[num]))
            mysql_cn.commit()
        except:
            mysql_cn.rollback()

    try:
       # Execute the SQL command
       cursor.execute ("UPDATE predictionapparel SET rf_prob=%s WHERE project_id=%d AND employee_id=%d"%
                    (e[num],project_id,em[num]))

       # Commit your changes in the database
       mysql_cn.commit()
    except:
       # Rollback in case there is any error
       mysql_cn.rollback()

# disconnect from server
mysql_cn.close()
