<?php


namespace LearnerApi\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class Form3Request extends FormRequest {

	public function rules()
	{
		return [
			'diapo-title'   => '',
			'diapo-data'    => 'required',
			'diapo-picture' => 'mimes:jpg,jpeg,png',
			'diapo-audio'   => 'mimes:mp3',
		];
	}

	public function authorize()
	{
		return true;
	}

}