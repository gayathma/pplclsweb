<?php

namespace Modules\Dash\Repositories\Eloquent;

use Modules\Dash\Entities\Eloquent\Projectapparel;
use Modules\Dash\Entities\Eloquent\Knowledgebase;
use Modules\Dash\Entities\Eloquent\Knowledgebaseapparel;
use Modules\Dash\Contracts\ProjectapparelRepositoryContract;
use Prettus\Repository\Eloquent\BaseRepository;
use DB;


class ProjectapparelRepository extends BaseRepository implements ProjectapparelRepositoryContract
{

    public function create(array $attributes)
    {
        $dates = explode('-', $attributes['duration']);
        $project = Projectapparel::create(array_only(array_merge($attributes,['wo_received_date' => trim($dates[0]), 'estimated_end_date' => trim($dates[1])]), [
            'name', 'wo_received_date', 'estimated_end_date', 'type', 'description','is_team_assigned'
            ]));

        $project->save();
    }
 
    public function model()
    {
        return Projectapparel::class;
    }

    public function getWorkloadChartData()
    {
        $all_projects = Projectapparel::count();
        $results = Knowledgebaseapparel::join('dim_hproject_apparel', 'dim_hproject_apparel.id', '=', 'fact_knowledgebase_apparel.dim_hproject_id')
            ->select('dim_hproject_apparel.name as project',DB::raw('sum(workload_actual) as data'))
            ->whereNotNull('actual_end_date')
            ->groupBy('dim_hproject_id')
            ->get();
        

        $result_arr = [];
        foreach ($results as $result) {
            $result_arr[] = (($result->data/$all_projects)*10);
        }

        $data = ['name' => 'Success Rate' , 'data' => $result_arr];
    
        return $data;

    }
}