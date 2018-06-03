<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'users';
	protected $hidden = array('password', 'remember_token');

	public function name(){
		return $this->firstname . ' ' . $this->lastname;
	}

	public function role(){
		return $this->belongsTo('Role', 'role_id');
	}

	public static function loginValidator($data){
		return Validator::make($data,
		    array(
		    	'email' => 'required|email',
		    	'password' => 'required|min:4'
		    )
		);
	}

	public static function getValidator($id, $data){
		if($id != 0){
			return Validator::make($data,
			    array(
			    	'firstname' 	=> 'required',
			    	'lastname' 		=> 'required',
			    	'email' 		=> 'required|email',
					'role_id' 		=> 'required',
			    )
			);
		}else{
			return Validator::make($data,
			    array(
			    	'firstname' 	=> 'required',
			    	'lastname' 		=> 'required',
			    	'email' 		=> 'required|email',
					'password'		=> 'required|confirmed',
					'role_id' 		=> 'required',
			    )
			);
		}

		
	}

}
