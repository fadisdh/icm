<?php

class Unit extends Eloquent {

	protected $table = 'units';
	protected $guarded = array('id');

    public function projects()
    {
        return $this->belongsToMany('Project');
    }

    public static $Validation = array(
        'name'  => 'required|min:3',
        'name_arabic'  => 'required',
    );

    public static function validate($id, $data){

        $validation = static::$Validation;

        return Validator::make($data, $validation);
    }

    public static function getUnits(){

        $units = Unit::all();

        return getSelect($units);
    }
}