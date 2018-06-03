<?php

class Division extends Eloquent {

	protected $table = 'divisions';
	protected $guarded = array('id');

	public function project()
	{
        return $this->belongsTo('Project');
    }

    public function sections()
    {
        return $this->hasMany('Section');
    }

    public static $Validation = array(
    );

    public static function validate($id, $data){

        $validation = static::$Validation;

        return Validator::make($data, $validation);
    }

    public static function getDivisions($reportId){

        $report = Report::find($reportId);

        $divisions = Division::where('project_id', '=', $report->project_id)->get();

        $select = array('' => '-- SELECT --');

        foreach ($divisions as $division) {
            $select[$division->id] = $division->id;
        }

        return $select;
    }
}