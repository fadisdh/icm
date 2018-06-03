<?php



class ToolOperation extends Eloquent {



    protected $table = 'tool_operations';

    protected $guarded = array('id');



    public function report()

    {

        return $this->belongsTo('Report', 'report_id');

    }



    public function tool()

    {

        return $this->belongsTo('Tool', 'tool_id');

    }



    public function division(){

        return $this->belongsTo('Division', 'division_id');   

    }



    public function section(){

        return $this->belongsTo('Section', 'section_id');   

    }



    public function item(){

        return $this->belongsTo('Item', 'item_id');

    }



    public function getDSI(){

        return $this->division->code . $this->section->code . $this->item->code;

    }

    public function attachments(){

        return $this->morphMany('Attachment', 'model');
    }


    public static function getDir($id){
        return sprintf(Config::get('vars/paths.tool_operation'), $id);
    }

    public function getFullPath(){
        $attachment = Attachment::where('model_id', '=', $this->id)
                                ->where('model_type', '=', 'ToolOperation')->first();

        return URL::route('tool.operation.attachment.download', array('id'=> $attachment->id));
    }

    public static $Validation = array(

        'date_operation'    => 'required',

        'operation'         => 'required',

        'condition'         => 'required',

        'transportar_name'  => 'required',

    );


    public static function validate($id, $data){

        $validation = static::$Validation;

        return Validator::make($data, $validation);

    }

    public static $ValidationReport = array(

        'division'    => 'required',

        'section'         => 'required',

        'item'         => 'required',

    );


    public static function validateReport($id, $data){

        $validation = static::$ValidationReport;

        return Validator::make($data, $validation);

    }

}