<?php


namespace LearnerApi\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class Form3InsertRequest extends FormRequest {

	public function rules()
	{
		return [
			'diapo-title'   => '',
			'diapo-data'    => 'required',
			'diapo-picture' => 'required|mimes:jpg,jpeg,png',
		];
	}

	public function authorize()
	{
		return true;
	}

}