<?php



class Report extends Eloquent {



	protected $table = 'reports';

	protected $guarded = array('id');



	public function project(){

		return $this->belongsTo('Project');

	}



    public function siteStaffs(){

        return $this->hasMany('ReportSiteStaff');

    }



    public function companyLabors(){

        return $this->hasMany('ReportCompanyLabor');

    }



    public function subLabors(){

        return $this->hasMany('ReportSubcontractorLabor');

    }



    public function companyMaterials(){

        return $this->hasMany('ReportCompanyMaterial');

    }



    public function subMaterials(){

        return $this->hasMany('ReportSubcontractorMaterial');

    }



    public function equipments(){

        return $this->hasMany('EquipmentOperation')
                    ->where('project_location', '=', $this->project_id)
                    ->where('date_operation', '=', $this->date);

    }



    public function tools(){

        return $this->hasMany('ToolOperation')
                    ->where('project_location', '=', $this->project_id)
                    ->where('date_operation', '=', $this->date);

    }



    public function activities(){

        return $this->hasMany('ReportActivity');

    }



    public function violations(){

        return $this->hasMany('ReportViolation');

    }



    public function notes(){

        return $this->hasMany('ReportNote');

    }





    public static $Validation = array(

        

    );



    public static function validate($id, $data){



        $validation = static::$Validation;



        return Validator::make($data, $validation);

    }

}