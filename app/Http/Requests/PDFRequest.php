<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PDFRequest extends FormRequest
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
            "First_name_of_witness" => 'required',
            "Middle_name_of_witness" => 'required',
            "Last_name_of_witness" => 'required',
            "Street_address_of_witness" => 'required',
            "City_of_witness" => 'required',
            "State_of_witness" => 'required',
            "Zip_code_of_witness" => 'required',
            "Ten-digit_phone_number_of_witness" => 'required|numeric|digits:10',
            "Witness's_date_of_birth" => 'required|date',
            "Witness's_relationship_to_applicant" => 'required',
            "First_name_of_applicant" => 'required',
            "Middle_name_of_applicant" => 'required',
            "Last_name_of_applicant" => 'required',
            "Applicant's_date_of_birth" => 'required|date',
            "First_name_on_birth_record" => 'required',
            "Middle_name_on_birth_record" => 'required',
            "Last_name_on_birth_record" => 'required',
            "Date_of_birth/death" => 'required|date',
            "number_of_years" => 'required|numeric|min:0|max:200',
            "today's_date" => 'required|date',
        ];
    }
}
