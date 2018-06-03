<?php

class ContactPerson extends Eloquent {

	protected $table = 'contact_person';
	protected $guarded = array('id');

    public function supplier()
    {
        return $this->belongsTo('Supplier');
    }

    public static $Validation = array(
        'name' => 'required',
        'phone' => 'digits_between:5,15',
        'fax' => 'digits_between:5,15',
        'email' => 'email'

    );

    public static function validate($id, $data){

        $validation = static::$Validation;

        return Validator::make($data, $validation);
    }

    public static function getContactPersons(){
        $contacPersons = ContactPerson::all();
        return getSelect($contacPersons);
    }
}