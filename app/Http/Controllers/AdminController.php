<?php

namespace LearnerApi\Http\Controllers;


class AdminController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getIndex()
	{
		return 'JE SUIS DANS ADMIN !';
	}
}