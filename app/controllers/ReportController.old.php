<?php

class ReportController extends BaseController {

	public function all($projectId){
		
		$reports = Report::where('project_id', '=', $projectId)->paginate(15);

		return View::make('reports.all')
					->with('reports', $reports)
					->with('projectId', $projectId);
	}
	
	public function view($id, $projectId){

		$report = Report::find($id);
		return View::make('reports.view')->with('report', $report);
	}

	public function save($id, $projectId){

		if($id == 0){
			$report = new Report;
		}else{
			$report = Report::find($id);
		}

		return View::make('reports.save')->with('report', $report)->with('projectId', $projectId);
	}

	public function savePost($id, $projectId){
		
		if($id == 0){
			$report = new Report;
		}else{
			$report = Report::find($id);
		}

		$validator = Report::validate($id, Input::all());

		if ($validator->fails())
	    {
	    	return Redirect::route('report.save', $id, $projectId)->withErrors($validator)->withInput();
	    }

		$report->project_id = $projectId;
		$report->date = new DateTime(Input::get('date'));

		$res = $report->save();

		if($res) {
			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.report'));
		}else{
			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.report'));
		}

		return Redirect::route('project.reports', $report->project_id);
	}

	public function delete($id){

		$report = Report::find($id);
		$res = $report->delete();

		if($res) {
			$message = sprintf(trans('common.messages.delete_success'), trans('common.report'));
		}else{
			$message = sprintf(trans('common.messages.delete_success'), trans('common.report'));
		}

		return Redirect::route('project.reports')
				->with('action', 'action')
				->with('result', $res)
				->with('message', $message);
	}


	/* Save Site Staff
	*****************************************************************/
	public function saveSiteStaff($reportId){

		$siteStaffs = ReportSiteStaff::with('report', 'report.project')->where('report_id', $reportId)->paginate(15);
		$report = $siteStaffs[0]->report;
		$project = $report->project;

		return View::make('reports.sitestaffs.save')->with('siteStaffs', $siteStaffs)
													->with('report', $report)
													->with('project', $project);
	}

	public function savePostSiteStaff($reportId){
		
		$validator = ReportSiteStaff::validate(Input::all());

		if ($validator->fails())
	    {
	    	return Redirect::route('report.sitestaffs.save', $reportId)->withErrors($validator)->withInput();
	    }
	    
		$siteStaff = new ReportSiteStaff;

		$siteStaff->report_id = $reportId;
		$siteStaff->division_id = Input::get('divisions');
		$siteStaff->section_id = Input::get('sections');
		$siteStaff->item_id = Input::get('items');

		$siteStaff->staff_id = Input::get('staff_id');
		$siteStaff->working_hours = Input::get('working_hours');
		$res = $siteStaff->save();

		if($res) {
			$message = sprintf(trans('common.messages.add_success'), trans('report.staff_site'));
		}else{
			$message = sprintf(trans('common.messages.add_success'), trans('report.staff_site'));
		}

		return Redirect::route('report.sitestaffs.save',$siteStaff->report_id)
				->with('action', 'action')
				->with('result', $res)
				->with('message', $message);
	}

	/* Edit Site Staff
	*****************************************************************/
	public function editSiteStaff($id){

		$siteStaff = ReportSiteStaff::find($id);

		return View::make('reports.sitestaffs.edit')->with('siteStaff', $siteStaff)
													->with('id', $id);
	}

	public function editPostSiteStaff($id){

		$validator = ReportSiteStaff::validate(Input::all());

		if ($validator->fails())
	    {
	    	return Redirect::route('report.sitestaff.edit', $id)->withErrors($validator)->withInput();
	    }

		$siteStaff = ReportSiteStaff::find($id);

		$siteStaff->division_id = 1;
		$siteStaff->section_id = 1;
		$siteStaff->item_id = 1;

		$siteStaff->staff_id = Input::get('staff_id');
		$siteStaff->working_hours = Input::get('working_hours');
		
		$res = $siteStaff->save();

		if($res) {
			$message = sprintf(trans('common.messages.edit_success'), trans('report.staff_site'));
		}else{
			$message = sprintf(trans('common.messages.edit_success'), trans('report.staff_site'));
		}

		return Redirect::route('report.sitestaffs.save',$siteStaff->report_id)
				->with('action', 'action')
				->with('result', $res)
				->with('message', $message);

	}

	public function deleteSiteStaff($id){

		$siteStaff = ReportSiteStaff::find($id);
		$res = $siteStaff->delete();

		if($res) {
			$message = sprintf(trans('common.messages.delete_success'),  trans('report.staff_site'));
		}else{
			$message = sprintf(trans('common.messages.delete_success'),  trans('report.staff_site'));
		}

		return Redirect::route('report.sitestaffs.save',$siteStaff->report_id)
				->with('action', 'action')
				->with('result', $res)
				->with('message', $message);
	}

	/* Company Labors
	*****************************************************************/
	public function saveCompanyLabor($reportId){

		$labors = ReportCompanylabor::where('report_id', $reportId)->get();

		return View::make('reports.labors.save_company')->with('labors', $labors)
														->with('reportId', $reportId);
	}

	public function savePostCompanyLabor($reportId){

		$labors = ReportCompanylabor::where('report_id', $reportId)->get();
		$whs = Input::get('working_hours'); // Working hours
		$overtime = Input::get('overtime'); // Overtime
		$distribution = Input::get('distribution'); // Distribution
		$items = Input::get('items'); // Items

		foreach (Input::get('labor_id') as $laborId => $value) {
			if($value){

				$found = false;
				foreach ($labors as $labor) {
					if($labor->id == $laborId){
						$found = true;
					}
				}

				if($found == true){
					$labor = ReportCompanylabor::find($laborId);
				}else{
					$labor = new ReportCompanylabor;
				}

				$labor->report_id = $reportId;
				$labor->division_id = 1;
				$labor->section_id = 1;
				$labor->item_id = 1;

				$labor->labor_id = $value;
				$labor->working_hours = $whs[$laborId];
				$labor->overtime = $overtime[$laborId];
				$labor->distribution = $distribution[$laborId];
				$labor->items = $items[$laborId];
				$labor->save();
			}
		}

		return Redirect::route('report.sub.labors.save', $reportId);
	}

	/* Subcontractor Labors
	*****************************************************************/
	public function saveSubcontractorLabor($reportId){

		$labors = ReportSubcontractorLabor::where('report_id', $reportId)->get();

		return View::make('reports.labors.save_sub')->with('labors', $labors)
													->with('reportId', $reportId);
	}

	public function savePostSubcontractorLabor($reportId){

		$labors = ReportSubcontractorLabor::where('report_id', $reportId)->get();
		$num_labors = Input::get('num_labors'); // Working hours
		$skill = Input::get('skill'); // Overtime
		$distribution = Input::get('distribution'); // Distribution
		$items = Input::get('items'); // Items

		foreach (Input::get('supplier_id') as $subId => $value) {
			if($value){

				$found = false;
				foreach ($labors as $labor) {
					if($labor->id == $subId){
						$found = true;
					}
				}

				if($found == true){
					$labor = ReportSubcontractorLabor::find($subId);
				}else{
					$labor = new ReportSubcontractorLabor;
				}

				$labor->report_id = $reportId;
				$labor->division_id = 1;
				$labor->section_id = 1;
				$labor->item_id = 1;

				$labor->supplier_id = $value;
				$labor->num_labors = $num_labors[$subId];
				$labor->skill = $skill[$subId];
				$labor->distribution = $distribution[$subId];
				$labor->items = $items[$subId];
				$labor->save();
			}
		}

		return Redirect::route('report.company.materials.save', $reportId);
	}

	/* Company Materials
	*****************************************************************/
	public function saveCompanyMaterial($reportId){

		$materials = ReportCompanyMaterial::where('report_id', $reportId)->get();

		return View::make('reports.materials.save_company')->with('materials', $materials)
															->with('reportId', $reportId);
	}

	public function savePostCompanyMaterial($reportId){

		$labors = ReportCompanyMaterial::where('report_id', $reportId)->get();
		$whs = Input::get('working_hours'); // Working hours
		$overtime = Input::get('overtime'); // Overtime
		$distribution = Input::get('distribution'); // Distribution
		$items = Input::get('items'); // Items

		foreach (Input::get('labor_id') as $laborId => $value) {
			if($value){

				$found = false;
				foreach ($labors as $labor) {
					if($labor->id == $laborId){
						$found = true;
					}
				}

				if($found == true){
					$labor = ReportCompanyMaterial::find($laborId);
				}else{
					$labor = new ReportCompanyMaterial;
				}

				$labor->report_id = $reportId;
				$labor->division_id = 1;
				$labor->section_id = 1;
				$labor->item_id = 1;

				$labor->labor_id = $value;
				$labor->working_hours = $whs[$laborId];
				$labor->overtime = $overtime[$laborId];
				$labor->distribution = $distribution[$laborId];
				$labor->items = $items[$laborId];
				$labor->save();
			}
		}

		//return Redirect::route('report.sub.materials.save', $reportId);
	}	
}