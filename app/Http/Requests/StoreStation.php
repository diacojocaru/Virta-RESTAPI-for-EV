<?php

namespace App\Http\Requests;

use App\DTOs\Station;
use Illuminate\Foundation\Http\FormRequest;

class StoreStation extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'latitude' => 'required|numeric|gte:-90|lte:90',
            'longitude' => 'required|numeric|gte:-180|lte:180',
            'company_id' => 'required|exists:companies,id',
            'address' => 'required|string',
        ];
    }

    public function dto(): Station
    {
        return new Station(
            $this->input('name'),
            $this->input('latitude'),
            $this->input('longitude'),
            $this->input('company_id'),
            $this->input('address'),
        );
    }
}
