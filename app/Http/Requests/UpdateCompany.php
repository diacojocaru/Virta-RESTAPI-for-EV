<?php

namespace App\Http\Requests;

use App\DTOs\Company;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCompany extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'parent_company_id' => 'nullable|exists:companies,id',
        ];
    }

    public function dto(): Company
    {
        return new Company(
            $this->input('name'),
            $this->input('parent_company_id')
        );
    }
}
