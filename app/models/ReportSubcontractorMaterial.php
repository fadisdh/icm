<?php



class ReportSubcontractorMaterial extends Eloquent {



	protected $table = 'reports_subcontractor_materials';

	protected $guarded = array('id');



	public function report()

    {

        return $this->belongsTo('Report');

    }



    public function supplier(){

        return $this->belongsTo('Supplier', 'supplier_id');

    }



    public function unit(){

        return $this->belongsTo('Unit', 'unit_id');

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