<?php

namespace Modules\Dash\Repositories\Eloquent;

use Modules\Dash\Entities\Eloquent\Knowledgebaseapparel;
use Modules\Dash\Contracts\KnowledgebaseapparelRepositoryContract;
use Prettus\Repository\Eloquent\BaseRepository;


class KnowledgebaseapparelRepository extends BaseRepository implements KnowledgebaseapparelRepositoryContract
{

    public function create(array $employees)
    {
        $project = $employees['project'];
        foreach ($employees as $employee) {
            $employeeapparel = Knowledgebaseapparel::create(['dim_hemployee_id' => $employee->employee_id, 'workload_planned' => 0,
             'workload_actual' => 0, 'is_suitable' => 1 ,'dim_hproject_id' => $project->id, 'start_date' => $project->wo_received_date,
             'estimated_end_date' => $project->estimated_end_date]);

            $employeeapparel->save();
        }
        
    }
 
    public function model()
    {
        return Knowledgebaseapparel::class;
    }
}