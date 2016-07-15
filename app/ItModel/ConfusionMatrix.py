from __future__ import division
import numpy as np
import pymysql
import pandas as pd
from sklearn.cross_validation import KFold
from sklearn.svm import SVC
from sklearn.ensemble import RandomForestClassifier as RF
from sklearn.neighbors import KNeighborsClassifier as KNN

# Connect to the database
mysql_cn = pymysql.connect(host='localhost',
                             user='root',
                             password='',
                             db='pplcls')

df_mysql = pd.read_sql('select f.*,'
                       'e.age,e.working_experience_current,e.dim_hrole_id,e.working_experience_previous,e.dim_hqualifications_id,e.is_pmp_certified,e.grade,'
                       'p.type,p.project_value '
                       ' from fact_knowledgebase f '
                       'inner join dim_hemployee e on e.id = f.dim_hemployee_id '
                       'inner join dim_hproject p on p.id = f.dim_hproject_id;', con=mysql_cn)

predicted_result = df_mysql['is_suitable']
y = predicted_result

# We don't need these columns
to_drop = ['id','dim_hemployee_id','dim_hproject_id','is_suitable','type','start_date','estimated_end_date','actual_end_date']
predict_feat_space = df_mysql.drop(to_drop,axis=1)


# Pull out features for future use
features = predict_feat_space.columns

X = predict_feat_space.as_matrix().astype(np.float)

# This is important
from sklearn.preprocessing import StandardScaler
scaler = StandardScaler()
X = scaler.fit_transform(X)

def run_cv(X,y,clf_class,**kwargs):
    # Construct a kfolds object
    kf = KFold(len(y),n_folds=5,shuffle=True)
    y_pred = y.copy()

    # Iterate through folds
    for train_index, test_index in kf:
        X_train, X_test = X[train_index], X[test_index]
        y_train = y[train_index]
        # Initialize a classifier with key word arguments
        clf = clf_class(**kwargs)
        clf.fit(X_train,y_train)
        y_pred[test_index] = clf.predict(X_test)
    return y_pred


from sklearn.metrics import confusion_matrix

y = np.array(y)
class_names = np.unique(y)

confusion_matrices = [
    ( "Support Vector Machines", confusion_matrix(y,run_cv(X,y,SVC)) ),
    ( "Random Forest", confusion_matrix(y,run_cv(X,y,RF)) ),
    ( "K-Nearest-Neighbors", confusion_matrix(y,run_cv(X,y,KNN)) ),
]

print(confusion_matrices)

import matplotlib.pylab as pl

cm = confusion_matrix(y,run_cv(X,y,SVC))
fig = pl.figure()
ax = fig.add_subplot(111)
cax = ax.matshow(cm)
pl.title('Confusion matrix of the SVM classifier')
fig.colorbar(cax)

pl.xlabel('True Class')
pl.ylabel('Predicted Class')
pl.show()


cm = confusion_matrix(y,run_cv(X,y,RF))
fig = pl.figure()
ax = fig.add_subplot(111)
cax = ax.matshow(cm)
pl.title('Confusion matrix of the Random Forest classifier')
fig.colorbar(cax)

pl.xlabel('True Class')
pl.ylabel('Predicted Class')
pl.show()


cm = confusion_matrix(y,run_cv(X,y,KNN))
fig = pl.figure()
ax = fig.add_subplot(111)
cax = ax.matshow(cm)
pl.title('Confusion matrix of the K-nearest classifier')
fig.colorbar(cax)

pl.xlabel('True Class')
pl.ylabel('Predicted Class')
pl.show()