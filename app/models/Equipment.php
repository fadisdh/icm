<?php



class Equipment extends Eloquent {



	protected $table = 'equipments';

	protected $guarded = array('id');



	public function projects()

    {

        return $this->belongsToMany('Project');

    }

    public function prices(){

        return $this->morphMany('Price', 'model');
    }


    public function operations(){

        return $this->hasMany('EquipmentOperation');
    }

    public function attachments(){

        return $this->morphMany('Attachment', 'model');
    }


    public static function getDir($id){
        return sprintf(Config::get('vars/paths.equipment'), $id);
    }

    public function getFullPath(){
        $attachment = Attachment::where('model_id', '=', $this->id)
                                ->where('model_type', '=', 'Equipment')->first();

        return URL::route('equipment.attachment.download', array('id'=> $attachment->id));
    }


    public static $Validation = array(

        'name'  => 'required',

        'name_arabic'  => 'required',

        'type'  => 'required',

        'description'  => 'required',

        // 'unit'  => 'required',

        // 'rate'  => 'required',

        // 'price_validity_from'  => 'required',

        // 'price_validity_to'  => 'required',

    );



    public static function validate($id, $data){



        $validation = static::$Validation;



        return Validator::make($data, $validation);

    }



    public static function getEquipments(){



        $equipments = Equipment::all();

        

        return getSelect($equipments);

    }

}