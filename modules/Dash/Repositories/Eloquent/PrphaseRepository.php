<?php

namespace Modules\Dash\Repositories\Eloquent;

use Modules\Dash\Entities\Eloquent\Prphase;
use Modules\Dash\Contracts\PrphaseRepositoryContract;
use Prettus\Repository\Eloquent\BaseRepository;


class PrphaseRepository extends BaseRepository implements PrphaseRepositoryContract
{

    public function create(array $attributes)
    {
        $prphase = Prphase::create(array_only($attributes, ['name']));

        $prphase->save();
    }
 
    public function model()
    {
        return Prphase::class;
    }
}