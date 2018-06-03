<?php

class Section extends Eloquent {

	protected $table = 'sections';
	protected $guarded = array('id');

	public function division() {
        return $this->belongsTo('Division');
    }

    public function items() {
        return $this->hasMany('Item');
    }

    public static $Validation = array(
    );

    public static function validate($id, $data){

        $validation = static::$Validation;

        return Validator::make($data, $validation);
    }

    public static function getSections($divisionId){

        $sections = Section::where('division_id', '=', $divisionId)->get();

        $select = array('' => '-- SELECT --');

        foreach ($sections as $section) {
            $select[$section->id] = $section->id;
        }

        return $select;
    }

}