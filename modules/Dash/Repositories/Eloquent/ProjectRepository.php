<?php

namespace Modules\Dash\Repositories\Eloquent;

use Modules\Dash\Entities\Eloquent\Project;
use Modules\Dash\Contracts\ProjectRepositoryContract;
use Prettus\Repository\Eloquent\BaseRepository;


class ProjectRepository extends BaseRepository implements ProjectRepositoryContract
{

    public function create(array $attributes)
    {
        $dates = explode('-', $attributes['duration']);
        $project = Project::create(array_only(array_merge($attributes,['wo_received_date' => trim($dates[0]), 'estimated_end_date' => trim($dates[1])]), [
            'name', 'wo_received_date', 'estimated_end_date', 'type', 'description'
            ]));

        $project->save();

        /*//save prphases
        if (isset($attributes['project_phases'])) {
            $project->prphases()->sync($attributes['project_phases']);
        }*/
    }
 
    public function model()
    {
        return Project::class;
    }
}