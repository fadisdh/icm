<?php

class Role extends Eloquent {

	protected $table = 'roles';
	protected $guarded = array('id');

	public function users()
    {
        return $this->hasMany('User');
    }

    public static $Validation = array(
        'name'  => 'required|min:3',
    );

    public static function validate($id, $data){

        $validation = static::$Validation;

        return Validator::make($data, $validation);
    }

    public static function getRoles(){

        $roles = Role::all();
        
        return getSelect($roles);
    }
}