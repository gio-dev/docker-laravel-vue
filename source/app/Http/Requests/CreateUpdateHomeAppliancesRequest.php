<?php

namespace App\Http\Requests;

use App\Enum\HomeAppliancesTypes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUpdateHomeAppliancesRequest extends FormRequest
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
     * @return array<string, mixed>
     *
     * 'name',
    'description',
    'voltage',
    'brand',
     */

    public function rules()
    {
        return [
            'name' =>               'required|string|max:255',
            'description' =>        'required|string',
            'voltage' =>            'required|string|max:255',
            "brand" => [
                'required',
                Rule::in( HomeAppliancesTypes::toArray() )
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome do Eletrodoméstico é obrigatório.',
            'name.string' => 'O nome do Eletrodoméstico precisa ser um texto alfanumerico.',
            'name.max' => 'O nome do Eletrodoméstico não pode conter mais que :max caracteres',
            'description.required' => 'A descrição do Eletrodoméstico é obrigatória.',
            'description.string' => 'A descrição do Eletrodoméstico precisa ser um texto alfanumerico.',
            'voltage.required' => 'A voltagem do Eletrodoméstico é obrigatória.',
            'voltage.string' => 'A voltagem do Eletrodoméstico precisa ser um texto alfanumerico.',
            'voltage.max' => 'A voltagem do Eletrodoméstico não pode conter mais que :max caracteres',
            'brand.required' => 'A marca do Eletrodoméstico é obrigatória.',
            "brand.in" => "A marca precisa ser uma das seguintes: ".join(', ',HomeAppliancesTypes::listAllToArrayDesc())
        ];
    }
}
