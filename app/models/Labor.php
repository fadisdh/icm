<?php



class labor extends Eloquent {



	protected $table = 'labors';

	protected $guarded = array('id');



	public function projects()

    {

        return $this->belongsToMany('Project');

    }



    public function occupation(){

        return $this->hasOne('Occupation', 'id', 'occupation_id');

    }

    public function prices()

    {

        return $this->morphMany('Price', 'model');

    }

    public function attachments(){

        return $this->morphMany('Attachment', 'model');
    }

    public static function getDir($labor){
        return sprintf(Config::get('vars/paths.labor'), $labor);
    }

    public function getFullPath(){
        $attachment = Attachment::where('model_id', '=', $this->id)
                                ->where('model_type', '=', 'Labor')->first();

        return URL::route('labor.attachment.download', array('id'=> $attachment->id));
    }

    public static $Validation = array(
        'name'  => 'required|min:3',
        'phone' => 'digits_between:5,15',
        'nationality'  => 'required',
        'occupation'  => 'required',
        'residency_type'  => 'required',
        'civil_id'  => 'required',
    );



    public static function validate($id, $data){



        $validation = static::$Validation;



        return Validator::make($data, $validation);

    }



    public static function getLabors($projectId = null){



        if($projectId){

            $labors = Labor::where('project_id', '=', $projectId)->get();

        }else{

            $labors = Labor::all();

        }

        

        return getSelect($labors);

    }

}