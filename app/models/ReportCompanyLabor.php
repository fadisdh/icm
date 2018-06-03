<?php

class ReportCompanyLabor extends Eloquent {

	protected $table = 'reports_company_labors';
	protected $guarded = array('id');

	public function report()
    {
        return $this->belongsTo('Report');
    }

    public function labor(){
        return $this->belongsTo('Labor', 'labor_id');
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

    public static $Validation = array(
      
    );

    public static function validate($id, $data){

        $validation = static::$Validation;

        return Validator::make($data, $validation);
    }
}