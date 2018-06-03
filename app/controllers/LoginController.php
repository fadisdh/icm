<?php

class LoginController extends BaseController {

	public function login(){
		$this->SetTitle('Login');
		$this->setClass('login');

		return View::make('common.login');
	}

	public function loginPost(){
		$email = Input::get('email');
		$pass = Input::get('password');


		$validator = User::loginValidator(Input::all());		
		if($validator->fails()){
			return Redirect::to('login')->withErrors($validator);
		}

		$res = Auth::attempt(array(
			'email'		=> $email,
			'password' 	=> $pass
		));

		if($res){
			return Redirect::intended();
		}else{
			return Redirect::to('login')->withErrors(array('message' => Config::get('message.login.attempt')));
		}
	}

	public function logout(){
		Auth::logout();
		return Redirect::intended();
	}

}
