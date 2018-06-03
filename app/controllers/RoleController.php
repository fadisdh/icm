<?php

class RoleController extends BaseController {

	public function all(){
		
		$roles = Role::paginate(15);

		return View::make('roles.all')->with('roles', $roles);
	}
	
	public function view($id){
		$role = Role::find($id);
		return View::make('roles.view')->with('role', $role);
	}

	public function save($id){

		if($id == 0){
			$role = new Role;
		}else{
			$role = Role::find($id);
		}
		return View::make('roles.save')->with('role', $role);
	}

	public function savePost($id){
		
		if($id == 0){
			$role = new Role;
		}else{
			$role = Role::find($id);
		}

		$validator = Role::validate($id, Input::all());

		if ($validator->fails())
	    {
	    	return Redirect::route('role.save', $id)->withErrors($validator)->withInput();
	    }

	    $role->name = Input::get('name');

		$res = $role->save();

		if($res) {
			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.role'));
		}else{
			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.role'));
		}

		return Redirect::route('roles')
				->with('action', 'action')
				->with('result', $res)
				->with('message', $message);
	}

	public function delete($id){

		$role = Role::find($id);
		$res = $role->delete();

		if($res) {
			$message = sprintf(trans('common.messages.delete_success'), trans('common.role'));
		}else{
			$message = sprintf(trans('common.messages.delete_success'), trans('common.role'));
		}

		return Redirect::route('roles')
				->with('action', 'action')
				->with('result', $res)
				->with('message', $message);
	}

	public function export(){
		Excel::create('Roles', function($excel){
			$excel->setTitle('ICM System Roles');
			$excel->sheet('All Roles', function($sheet){
				$roles = Role::all();
				$sheet->fromArray($roles->toArray());
			});
		})->download('xls');
	}

	public function import(){
		
	}
}