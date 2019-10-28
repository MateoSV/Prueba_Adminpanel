<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\BasicModelRequest;
use Illuminate\Validation\Rule;

class UpdateCompanyRequest extends BasicModelRequest
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
            'name' => [
                'sometimes',
                'required',
                Rule::unique('companies')->ignore($this->company)
            ],
            'email' => 'sometimes|nullable|email',
            'logo' =>'sometimes|nullable|image|dimensions:min_width=100,min_height=100|mimes:jpg,png,jpeg',
            'website' => 'sometimes|nullable'
        ];
    }

    /**
     * @return string
     */
    protected function getLangFile(): string
    {
        return 'companies';
    }

}
