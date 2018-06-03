<?php



class ReportController extends BaseController {



	public function all($projectId){

		

		$project = Project::find($projectId);

		$reports = Report::where('project_id', '=', $projectId)->paginate(15);



		return View::make('reports.all')

					->with('reports', $reports)

					->with('project', $project);

	}

	

	public function view($id){



		$report = Report::find($id);

		return View::make('reports.view')->with('report', $report);

	}



	public function save($id, $projectId = 0){



		if($id == 0){

			$report = new Report();

			$report->project_id = $projectId; 



			$siteStaffs = array();

			$siteStaff = new ReportSiteStaff();

	

			$companyLabors = array();

			$companyLabor = new ReportCompanyLabor();



			$subLabors = array();

			$subLabor = new ReportSubcontractorLabor();



			$companyMaterials = array();

			$companyMaterial = new ReportCompanyMaterial();



			$subMaterials = array();

			$subMaterial = new ReportSubcontractorMaterial();



			$equipments = array();

			$companyEquipment = new EquipmentOperation();



			$tools = array();

			$companyTool = new ReportTool();



			$activities = array();

			$activity = new ReportActivity();



			$violations = array();

			$violation = new ReportViolation();



			$notes = array();

			$note = new ReportNote();



		}else{

			$report = Report::with('project', 'siteStaffs', 'companyLabors')->find($id);



			$siteStaffs = $report->siteStaffs;

			$siteStaff = Input::get('site_staff') ? ReportSiteStaff::find(Input::get('site_staff')) : new ReportSiteStaff();



			$companyLabors = $report->companyLabors()->with('labor')->get();

			$companyLabor = Input::get('company_labor') ? ReportCompanyLabor::find(Input::get('company_labor')) : new ReportCompanyLabor();

			

			$subLabors = $report->subLabors()->with('supplier', 'occupation')->get();

			$subLabor = Input::get('sub_labor') ? ReportSubcontractorLabor::find(Input::get('sub_labor')) : new ReportSubcontractorLabor();



			$companyMaterials = $report->companyMaterials()->with('material')->get();

			$companyMaterial = Input::get('company_material') ? ReportCompanyMaterial::find(Input::get('company_material')) : new ReportCompanyMaterial();



			$subMaterials = $report->subMaterials()->with('supplier', 'unit')->get();

			$subMaterial = Input::get('sub_material') ? ReportSubcontractorMaterial::find(Input::get('sub_material')) : new ReportSubcontractorMaterial();



			$equipments = EquipmentOperation::where('project_location', '=', $report->project_id)
                    						->where('date_operation', '=', $report->date)
											->get();

			$companyEquipment = Input::get('equipment') ? EquipmentOperation::find(Input::get('equipment')) : new EquipmentOperation();




			$tools = ToolOperation::where('project_location', '=', $report->project_id)
                    						->where('date_operation', '=', $report->date)
											->get();

			$companyTool = Input::get('tool') ? ToolOperation::find(Input::get('tool')) : new ToolOperation();



			$activities = $report->activities;

			$activity = Input::get('activity') ? ReportActivity::find(Input::get('activity')) : new ReportActivity();



			$violations = $report->violations;

			$violation = Input::get('violation') ? ReportViolation::find(Input::get('violation')) : new ReportViolation();



			$notes = $report->notes;

			$note = Input::get('note') ? ReportNote::find(Input::get('note')) : new ReportNote();

		}

		

		return View::make('reports.save')

					->with('report', $report)

					->with('siteStaffs', $siteStaffs)

					->with('siteStaff', $siteStaff)

					->with('companyLabors', $companyLabors)

					->with('companyLabor', $companyLabor)

					->with('subLabors', $subLabors)

					->with('subLabor', $subLabor)

					->with('companyMaterials', $companyMaterials)

					->with('companyMaterial', $companyMaterial)

					->with('subMaterials', $subMaterials)

					->with('subMaterial', $subMaterial)

					->with('equipments', $equipments)

					->with('equipment', $companyEquipment)

					->with('tools', $tools)

					->with('companyTool', $companyTool)

					->with('activities', $activities)

					->with('activity', $activity)

					->with('violations', $violations)

					->with('violation', $violation)

					->with('notes', $notes)

					->with('note', $note);

	}



	public function savePostInfo($id, $projectId){



		$validator = Report::validate($id, Input::all());



		if ($validator->fails())

	    {

	    	return Redirect::route('report.save', $id)->withErrors($validator)->withInput();

	    }



	    $report = $id ? Report::find($id) : new Report();

		$report->project_id = $projectId;

		$report->date = new DateTime(Input::get('date'));



		$res = $report->save();



		if($res) {

			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.report'));

		}else{

			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.report'));

		}



		return Redirect::route('project.report.save', array($report->id, '#site_staff'));

	}



	public function delete($id){


		$report = Report::find($id);

		$project = $report->project_id;

		$res = $report->delete();



		if($res) {

			$message = sprintf(trans('common.messages.delete_success'), trans('common.report'));

		}else{

			$message = sprintf(trans('common.messages.delete_success'), trans('common.report'));

		}



		return Redirect::route('project.reports', $project)

				->with('action', 'action')

				->with('result', $res)

				->with('message', $message);

	}





	/* Save Site Staff

	*****************************************************************/

	public function savePostSiteStaff($reportId, $staffId){
		$validator = ReportSiteStaff::validate(Input::all());
		if ($validator->fails()){
	    	return Redirect::route('project.report.save', array($reportId, 'site_staff' => $staffId, '#site_staff'))->withErrors($validator)->withInput();
	    }

	    $dsi = Input::get('dsi', array());
	    $total = 0;
	    if($dsi) foreach($dsi as $val){
	    	$total += (float)$val['share'];
	    }
	    if($total != 100){
	    	Session::flash('error', 'Total Share must be 100');
	    	return Redirect::route('project.report.save', array($reportId, 'site_staff' => $staffId, '#site_staff'))->withErrors($validator)->withInput();
	    }


	    $siteStaff = $staffId ? ReportSiteStaff::find($staffId) : new ReportSiteStaff();

		$siteStaff->report_id = $reportId;
		//$siteStaff->division_id = Input::get('division');
		//$siteStaff->section_id = Input::get('section');
		//$siteStaff->item_id = Input::get('item');
		$siteStaff->dsi = json_encode($dsi);
		$siteStaff->staff_id = Input::get('staff_id');
		$siteStaff->working_hours = Input::get('working_hours');
		$siteStaff->save();

		return Redirect::route('project.report.save', array($reportId, '#site_staff'));
	}



	/* Company Labors

	*****************************************************************/

	public function savePostCompanyLabor($reportId, $companyLaborId){
		$validator = ReportCompanyLabor::validate($reportId, Input::all());
	
		if ($validator->fails())
	    {
	    	return Redirect::route('report.report.save', array($reportId, '#company_labor'))->withErrors($validator)->withInput();
	    }

	    $companyLabor = $companyLaborId ? ReportCompanyLabor::find($companyLaborId) : new ReportCompanyLabor();



		$companyLabor->report_id = $reportId;
		//$companyLabor->division_id = Input::get('division');
		//$companyLabor->section_id = Input::get('section');
		//$companyLabor->item_id = Input::get('item');
		$dsi = Input::get('dsi', array());
	    $total = 0;
	    if($dsi) foreach($dsi as $val){
	    	$total += (float)$val['share'];
	    }
	    if($total != 100){
	    	Session::flash('error', 'Total Share must be 100');
	    	return Redirect::route('project.report.save', array($reportId, 'company_labor' => $companyLaborId, '#company_labor'))->withErrors($validator)->withInput();
	    }
	    $companyLabor->dsi = json_encode($dsi);

		$companyLabor->labor_id = Input::get('labor_id');

		$companyLabor->working_hours = Input::get('working_hours');

		$companyLabor->overtime = Input::get('overtime'); // Overtime

		$companyLabor->distribution = Input::get('distribution'); // Distribution

		$companyLabor->num_items = Input::get('num_items'); // Items

		$companyLabor->save();



		return Redirect::route('project.report.save', array($reportId, '#company_labor'));

	}



	/* Subcontractor Labors

	*****************************************************************/

	public function savePostSubcontractorLabor($reportId, $subLaborId){





		$validator = ReportSubcontractorLabor::validate($reportId, Input::all());



		if ($validator->fails())

	    {

	    	return Redirect::route('report.report.save', $reportId)->withErrors($validator)->withInput();

	    }



	    $subLabor = $subLaborId ? ReportSubcontractorLabor::find($subLaborId) : new ReportSubcontractorLabor();



		$subLabor->report_id = $reportId;

		//$subLabor->division_id = Input::get('division');
		//$subLabor->section_id = Input::get('section');
		//$subLabor->item_id = Input::get('item');
		$dsi = Input::get('dsi', array());
	    $total = 0;
	    if($dsi) foreach($dsi as $val){
	    	$total += (float)$val['share'];
	    }
	    if($total != 100){
	    	Session::flash('error', 'Total Share must be 100');
	    	return Redirect::route('project.report.save', array($reportId, 'sub_labor' => $subLaborId, '#sub_labor'))->withErrors($validator)->withInput();
	    }
	    $subLabor->dsi = json_encode($dsi);


		$subLabor->supplier_id = Input::get('supplier_id');

		$subLabor->num_labors = Input::get('num_labors');

		$subLabor->skill = Input::get('skill'); // Overtime

		$subLabor->num_items = Input::get('num_items'); // Items

		$subLabor->distribution = Input::get('distribution'); // Distribution



		$subLabor->save();



		return Redirect::route('project.report.save', array($reportId, '#sub_labor'));

	}



	/* Company Materials

	*****************************************************************/

	public function savePostCompanyMaterial($reportId, $companyMaterialId){

		

		$validator = ReportCompanyMaterial::validate($reportId, Input::all());



		if ($validator->fails())

	    {

	    	return Redirect::route('report.report.save', array($reportId, '#company_material'))->withErrors($validator)->withInput();

	    }



	    $companyMaterial = $companyMaterialId ? ReportCompanyMaterial::find($companyMaterialId) : new ReportCompanyMaterial();



		$companyMaterial->report_id = $reportId;

		//$companyMaterial->division_id = Input::get('division');
		//$companyMaterial->section_id = Input::get('section');
		//$companyMaterial->item_id = Input::get('item');
		$dsi = Input::get('dsi', array());
	    $total = 0;
	    if($dsi) foreach($dsi as $val){
	    	$total += (float)$val['share'];
	    }
	    if($total != 100){
	    	Session::flash('error', 'Total Share must be 100');
	    	return Redirect::route('project.report.save', array($reportId, 'company_material' => $companyMaterialId, '#company_material'))->withErrors($validator)->withInput();
	    }
	    $companyMaterial->dsi = json_encode($dsi);
		

		$companyMaterial->receipt_type = Input::get('receipt_type');

		

		if(Input::get('receipt_type') == 'receipt'){

			$companyMaterial->supplier_id = Input::get('receipt_supplier_id');

			$companyMaterial->material_id = Input::get('material_id');

			$companyMaterial->unit_id = Input::get('receipt_unit_id');	

		}else{

			$companyMaterial->supplier_id = Input::get('bill_supplier_id');

			$companyMaterial->material = Input::get('material');

			$companyMaterial->unit_id = Input::get('bill_unit_id');

			$companyMaterial->unit_price = Input::get('unit_price');

		}

		

		$companyMaterial->quantity = Input::get('quantity');

		$companyMaterial->num_items = Input::get('num_items');

		$companyMaterial->receipt_ref = Input::get('receipt_ref');

		$companyMaterial->distribution = Input::get('distribution'); // Distribution

		

		$companyMaterial->save();



		return Redirect::route('project.report.save', array($reportId, '#company_material'));

	}



	/* Sub Materials

	*****************************************************************/

	public function savePostSubcontractorMaterial($reportId, $subMaterialId){

		

		$validator = ReportSubcontractorMaterial::validate($reportId, Input::all());



		if ($validator->fails())

	    {

	    	return Redirect::route('report.report.save', array($reportId, '#sub_material'))->withErrors($validator)->withInput();

	    }



	    $subMaterial = $subMaterialId ? ReportSubcontractorMaterial::find($subMaterialId) : new ReportSubcontractorMaterial();



		$subMaterial->report_id = $reportId;

		//$subMaterial->division_id = Input::get('division');
		//$subMaterial->section_id = Input::get('section');
		//$subMaterial->item_id = Input::get('item');
		$dsi = Input::get('dsi', array());
	    $total = 0;
	    if($dsi) foreach($dsi as $val){
	    	$total += (float)$val['share'];
	    }
	    if($total != 100){
	    	Session::flash('error', 'Total Share must be 100');
	    	return Redirect::route('project.report.save', array($reportId, 'sub_material' => $subMaterialId, '#sub_material'))->withErrors($validator)->withInput();
	    }
	    $subMaterial->dsi = json_encode($dsi);

		

		$subMaterial->supplier_id = Input::get('supplier_id');

		$subMaterial->material = Input::get('material');

		$subMaterial->unit_id = Input::get('unit_id');	

		
		$subMaterial->quantity = Input::get('quantity');

		$subMaterial->num_items = Input::get('num_items');

		$subMaterial->receipt_ref = Input::get('receipt_ref');

		$subMaterial->distribution = Input::get('distribution');


		$subMaterial->save();



		return Redirect::route('project.report.save', array($reportId, '#sub_material'));

	}



	/* Equipment

	*****************************************************************/

	public function savePostEquipment($reportId, $eqOperationId){



		$validator = EquipmentOperation::validateReport($reportId, Input::all());



		if ($validator->fails())

	    {

	    	return Redirect::route('project.report.save', array($reportId, '#equipment'))->withErrors($validator)->withInput();

	    }

	    

	    $equipment = $eqOperationId ? EquipmentOperation::find($eqOperationId) : new EquipmentOperation();



	    $equipment->project_id = Report::find($reportId)->project->id;

	    $equipment->user_id = 1;

		$equipment->report_id = $reportId;



		$equipment->division_id = Input::get('division');

		$equipment->section_id = Input::get('section');

		$equipment->item_id = Input::get('item');



		$equipment->working_hours = Input::get('working_hours');

		$equipment->overtime = Input::get('overtime');

		$equipment->num_items = Input::get('num_items');

		$equipment->distribution = Input::get('distribution');



		$equipment->save();



		return Redirect::route('project.report.save', array($reportId, '#equipment'));

	}



	/* Tool

	*****************************************************************/

	public function savePostTool($reportId, $toolOperationId){



		$validator = ToolOperation::validateReport($reportId, Input::all());



		if ($validator->fails())

	    {

	    	return Redirect::route('project.report.save', array($reportId, '#tool'))->withErrors($validator)->withInput();

	    }

	    

	    $tool = $toolOperationId ? ToolOperation::find($toolOperationId) : new ToolOperation();


	    $tool->project_id = Report::find($reportId)->project->id;

	    $tool->user_id = 1;

		$tool->report_id = $reportId;



		$tool->division_id = Input::get('division');

		$tool->section_id = Input::get('section');

		$tool->item_id = Input::get('item');


		$tool->used = Input::get('used') ? 1 : 0;

		// $tool->working_hours = Input::get('working_hours');

		// $tool->overtime = Input::get('overtime');

		$tool->num_items = Input::get('num_items');

		$tool->distribution = Input::get('distribution');



		$tool->save();



		return Redirect::route('project.report.save', array($reportId, '#tool'));

	}



	/* Activity

	*****************************************************************/

	public function savePostActivity($reportId, $activityId){



		$validator = ReportActivity::validate($reportId, Input::all());



		if ($validator->fails())

	    {

	    	return Redirect::route('report.report.save', array($reportId, '#activity'))->withErrors($validator)->withInput();

	    }



	    $activity = $activityId ? ReportActivity::find($activityId) : new ReportActivity();



		$activity->report_id = $reportId;

		//$activity->division_id = Input::get('division');
		//$activity->section_id = Input::get('section');
		//$activity->item_id = Input::get('item');
		$dsi = Input::get('dsi', array());
	    $total = 0;
	    if($dsi) foreach($dsi as $val){
	    	$total += (float)$val['share'];
	    }
	    if($total != 100){
	    	Session::flash('error', 'Total Share must be 100');
	    	return Redirect::route('project.report.save', array($reportId, 'activity' => $activityId, '#activity'))->withErrors($validator)->withInput();
	    }
	    $activity->dsi = json_encode($dsi);


		$activity->activity = Input::get('activity');



		$activity->save();



		return Redirect::route('project.report.save', array($reportId, '#activity'));

	}



	/* Violation

	*****************************************************************/

	public function savePostViolation($reportId, $violationId){



		$validator = ReportViolation::validate($reportId, Input::all());



		if ($validator->fails())

	    {

	    	return Redirect::route('report.report.save', array($reportId, '#violation'))->withErrors($validator)->withInput();

	    }



	    $violation = $violationId ? ReportViolation::find($violationId) : new ReportViolation();



		$violation->report_id = $reportId;



		$violation->description = Input::get('description');

		$violation->type = Input::get('type');

		$violation->name = Input::get('name');

		$violation->amount = Input::get('amount');



		$violation->save();



		return Redirect::route('project.report.save', array($reportId, '#violation'));

	}



	/* Note

	*****************************************************************/

	public function savePostNote($reportId, $noteId){



		$validator = ReportNote::validate($reportId, Input::all());



		if ($validator->fails())

	    {

	    	return Redirect::route('report.report.save', array($reportId, '#note'))->withErrors($validator)->withInput();

	    }



	    $note = $noteId ? ReportNote::find($noteId) : new ReportNote();



		$note->report_id = $reportId;



		$note->note = Input::get('note');

		$note->save();



		return Redirect::route('project.report.save', array($reportId, '#note'));

	}

}