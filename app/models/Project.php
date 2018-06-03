<?php

class Project extends Eloquent {

	protected $table = 'projects';
	protected $guarded = array('id');

	public function occupation() {
        return $this->belongsToMany('Occupation', 'project_occupation');
    }

    public function materials() {
        return $this->belongsToMany('Material', 'project_material');
    }

    public function units() {
        return $this->belongsToMany('Unit', 'project_unit');
    }

    public function labors() {
        return $this->belongsToMany('labor', 'project_labor');
    }

    public function suppliers() {
        return $this->belongsToMany('Supplier', 'project_supplier');
    }

    public function equipments() {
        return $this->belongsToMany('Equipment', 'project_equipment');
    }

    public function tools() {
        return $this->belongsToMany('Tool', 'project_tool');
    }

    public function divisions() {
        return $this->hasMany('Division');
    }

    public static $Validation = array(
        'name'          => 'required'
    );

    public static function validate($id, $data){

        $validation = static::$Validation;

        return Validator::make($data, $validation);
    }
}