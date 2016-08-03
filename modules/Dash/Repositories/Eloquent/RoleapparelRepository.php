<?php

namespace Modules\Dash\Repositories\Eloquent;

use Modules\Dash\Entities\Eloquent\Roleapparel;
use Modules\Dash\Contracts\RoleapparelRepositoryContract;
use Prettus\Repository\Eloquent\BaseRepository;


class RoleapparelRepository extends BaseRepository implements RoleapparelRepositoryContract
{

    public function create(array $attributes)
    {
        $role = Roleapparel::create(array_only($attributes, ['name']));

        $role->save();
    }
 
    public function model()
    {
        return Roleapparel::class;
    }
}