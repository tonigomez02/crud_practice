<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\Console\Input\Input;

class CreatePlayerRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required | min:2',
            'lastname' => 'required | min:2',
            'position' => 'max:1',
            'birthdate' => 'required',
            'description' => 'max:100',
            'salary' => 'required | max:10 |',
            'retired' => 'boolean'
        ];
    }
}
