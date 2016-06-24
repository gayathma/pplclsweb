<?php

namespace Modules\Dash\Http\Requests;

use App\Http\Requests\Request;
use Modules\Dash\Contracts\TechnologyRepositoryContract as TechnologyRepository;
use Request as HttpRequest;

class UpdateTechnologyRequest extends Request
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
    public function rules(TechnologyRepository $technologyRepository)
    {
        $rules = new CreateTechnologyRequest();

        return array_merge($rules->rules(), [
                'name' => 'required'
            ]);

    }
}