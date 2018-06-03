<?php



class Tool extends Eloquent {



	protected $table = 'tools';

	protected $guarded = array('id');



	public function projects()

    {

        return $this->belongsToMany('Project');

    }

    public function attachments(){

        return $this->morphMany('Attachment', 'model');
    }


    public static function getDir($id){
        return sprintf(Config::get('vars/paths.tool'), $id);
    }

    public function getFullPath(){
        $attachment = Attachment::where('model_id', '=', $this->id)
                                ->where('model_type', '=', 'Tool')->first();

        return URL::route('tool.attachment.download', array('id'=> $attachment->id));
    }


    public static $Validation = array(

        'name'  => 'required|min:3',

        'name_arabic'  => 'required',

        'type'  => 'required',

        'description'  => 'required',

        'unit'  => 'required',

        'unit_rate'  => 'required',

        'quantity'  => 'required',

        'price_validity_from'  => 'required',

        'price_validity_to'  => 'required',

    );



    public static function validate($id, $data){



        $validation = static::$Validation;



        return Validator::make($data, $validation);

    }



    public static function getTools(){



        $tools = Tool::all();

        

        return getSelect($tools);

    }

}