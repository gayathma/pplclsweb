<?php

namespace Modules\Dash\Repositories\Eloquent;

use Modules\Dash\Entities\Eloquent\ProjectType;
use Modules\Dash\Contracts\ProjectTypeRepositoryContract;
use Prettus\Repository\Eloquent\BaseRepository;


class ProjectTypeRepository extends BaseRepository implements ProjectTypeRepositoryContract
{

    public function create(array $attributes)
    {
        $projectType = ProjectType::create(array_only($attributes, ['name']));

        $projectType->save();
    }
 
    public function model()
    {
        return ProjectType::class;
    }
}