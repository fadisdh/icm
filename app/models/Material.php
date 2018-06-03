<?php



class Material extends Eloquent {



	protected $table = 'materials';

	protected $guarded = array('id');



	public function projects()

    {

        return $this->belongsToMany('Project');

    }



    public function supplier()

    {

        return $this->belongsTo('Supplier', 'supplier_id');

    }



    public function unit()

    {

        return $this->belongsTo('Unit', 'unit_id');

    }



    public function prices()

    {

        return $this->morphMany('Price', 'model');

    }

    public function attachments(){

        return $this->morphMany('Attachment', 'model');
    }

    public static function getDir($material){
        return sprintf(Config::get('vars/paths.material'), $material);
    }

    public function getFullPath(){
        $attachment = Attachment::where('model_id', '=', $this->id)
                                ->where('model_type', '=', 'Material')->first();

        return URL::route('material.attachment.download', array('id'=> $attachment->id));
    }



    public static $Validation = array(

        'name'                  => 'required|min:3',

        'name_arabic'           => 'required',

        'unit_id'               => 'required',

        'price'                 => 'required',

        'validity_from'         => 'required',

        'validity_to'           => 'required',

        'supplier_id'           => 'required'

    );



    public static function validate($id, $data){



        $validation = static::$Validation;



        return Validator::make($data, $validation);

    }



    public static function getMaterials(){



        $materials = Material::all();



        return getSelect($materials);

    }

}