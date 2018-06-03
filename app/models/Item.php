<?php

class Item extends Eloquent {

	protected $table = 'items';
	protected $guarded = array('id');

	public function section() {
        return $this->belongsTo('Section');
    }

    public static $Validation = array(
    );

    public static function validate($id, $data){

        $validation = static::$Validation;

        return Validator::make($data, $validation);
    }

    public static function getItems($sectionId){

        $items = Item::where('section_id', '=', $sectionId)->get();

        $select = array('' => '-- SELECT --');

        foreach ($items as $item) {
            $select[$item->id] = $item->id;
        }

        return $select;
    }
}