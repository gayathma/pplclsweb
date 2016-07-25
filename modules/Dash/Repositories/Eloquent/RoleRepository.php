<?php

namespace Modules\Dash\Repositories\Eloquent;

use Modules\Dash\Entities\Eloquent\Role;
use Modules\Dash\Contracts\RoleRepositoryContract;
use Prettus\Repository\Eloquent\BaseRepository;


class RoleRepository extends BaseRepository implements RoleRepositoryContract
{

    public function create(array $attributes)
    {
        $role = Role::create(array_only($attributes, ['name','parent']));

        $role->save();
    }
 
    public function model()
    {
        return Role::class;
    }
}