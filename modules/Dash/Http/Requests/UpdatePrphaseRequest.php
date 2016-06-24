<?php

namespace Modules\Dash\Http\Requests;

use App\Http\Requests\Request;
use Modules\Dash\Contracts\PrphaseRepositoryContract as PrphaseRepository;
use Request as HttpRequest;

class UpdatePrphaseRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(PrphaseRepository $prphaseRepository)
    {
        $rules = new CreatePrphaseRequest();

        return array_merge($rules->rules(), [
                'name' => 'required'
            ]);

    }
}