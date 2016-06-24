<?php

namespace Modules\Dash\Repositories\Eloquent;

use Modules\Dash\Entities\Eloquent\Technology;
use Modules\Dash\Contracts\TechnologyRepositoryContract;
use Prettus\Repository\Eloquent\BaseRepository;


class TechnologyRepository extends BaseRepository implements TechnologyRepositoryContract
{

    public function create(array $attributes)
    {
        $technology = Technology::create(array_only($attributes, ['name']));

        $technology->save();
    }
 
    public function model()
    {
        return Technology::class;
    }
}