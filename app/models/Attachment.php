<?php



class Attachment extends Eloquent {



	protected $table = 'attachments';

	protected $guarded = array('id');

	public function model()
    {
        return $this->morphTo();
    }

    public static function getDir($attachment){

        return sprintf(Config::get('vars/paths.supplier'), $attachment);
    }

    public function getFullPath($id){

        $attachment = Attachment::find($id);

        return URL::route('attachment.download', array('id'=> $attachment->id));
    }

	public static $Validation = array(

    );



    public static function validate($id, $data){



        $validation = static::$Validation;



        return Validator::make($data, $validation);

    }

}