<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\BasicModelRequest;

class UpdateEmployeeRequest extends BasicModelRequest
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
            'name' => 'sometimes|required',
            'last_name' => 'sometimes|required',
            'email' => 'sometimes|nullable|email',
            'phone' => 'sometimes|nullable',
            'company_id' => 'sometimes|required|integer|exists:companies,id',
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
