<?php

class UserController extends BaseController {

	public function all(){

		$users = User::paginate(15);

		return View::make('users.all')->with('users', $users);
	}
	
	public function view($id){

		$user = User::find($id);
		return View::make('users.view')->with('user', $user);
	}

	public function save($id){

		if($id == 0){
			$user = new User;
		}else{
			$user = User::find($id);
		}
		return View::make('users.save')->with('user', $user);
	}

	public function savePost($id){
		
		if($id == 0){
			$user = new User;
		}else{
			$user = User::find($id);
		}

		$validator = User::getValidator($id, Input::all());

		if ($validator->fails())
	    {
	    	return Redirect::route('user.save', $id)->withErrors($validator)->withInput();
	    }

	    $user->firstname = Input::get('firstname');
	    $user->lastname = Input::get('lastname');
	    $user->email = Input::get('email');
	    $user->role_id = Input::get('role_id');
	    if($id == 0) $user->password = Hash::make(Input::get('password'));
	   
		$res = $user->save();

		if($res) {
			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.user'));
		}else{
			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.user'));
		}

		return Redirect::route('users')
				->with('action', 'action')
				->with('result', $res)
				->with('message', $message);
	}

	public function delete($id){

		$user = User::find($id);
		$res = $user->delete();

		if($res) {
			$message = sprintf(trans('common.messages.delete_success'), trans('common.user'));
		}else{
			$message = sprintf(trans('common.messages.delete_success'), trans('common.user'));
		}

		return Redirect::route('users')
				->with('action', 'action')
				->with('result', $res)
				->with('message', $message);
	}

	public function export(){
		Excel::create('Users', function($excel){
			$excel->setTitle('ICM System Users');
			$excel->sheet('All Users', function($sheet){
				$users = User::all();
				$sheet->fromArray($users->toArray());
			});
		})->download('xls');
	}

	public function import(){
		
	}
}