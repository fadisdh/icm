<?php

class Occupation extends Eloquent {

	protected $table = 'occupations';
	protected $guarded = array('id');

	public function projects() {
        return $this->belongsToMany('Project');
    }

    public function labor(){
        return $this->belongsTo('Labor');
    }

    public static $Validation = array(
        'name'  => 'required|min:3',
        'name_arabic'  => 'required',
    );

    public static function validate($id, $data){

        $validation = static::$Validation;

        return Validator::make($data, $validation);
    }

    public static function getOccupations(){
        $occupations = Occupation::all();
        return getSelect($occupations);
    }
}