<?php

class ProjectController extends BaseController {

	public function all(){
		
		$projects = Project::paginate(15);

		return View::make('projects.all')->with('projects', $projects);
	}
	
	public function view($id){
		$project = Project::find($id);
		return View::make('projects.view')->with('project', $project);
	}

	public function save($id){

		if($id == 0){
			$project = new Project;
		}else{
			$project = Project::find($id);
		}

		return View::make('projects.save')->with('project', $project);
	}

	public function savePost($id){
		
		if($id == 0){
			$project = new Project;
		}else{
			$project = Project::find($id);
		}

		$validator = Project::validate($id, Input::all());

		if ($validator->fails())
	    {
	    	return Redirect::route('project.save', $id)->withErrors($validator)->withInput();
	    }

	    $project->user_id = 1;

		$project->name = Input::get('name');
		$project->name_arabic = Input::get('name_arabic');
		$project->description = Input::get('description');
		
		$res = $project->save();

		if($res) {
			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.project'));
		}else{
			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.project'));
		}

		return Redirect::route('projects')
				->with('action', 'action')
				->with('result', $res)
				->with('message', $message);
	}

	public function delete($id){

		$project = Project::find($id);
		$res = $project->delete();

		if($res) {
			$message = sprintf(trans('common.messages.delete_success'), trans('common.project'));
		}else{
			$message = sprintf(trans('common.messages.delete_success'), trans('common.project'));
		}

		return Redirect::route('projects')
				->with('action', 'action')
				->with('result', $res)
				->with('message', $message);
	}

	public function deleteDSI($id){

		$item = Item::find($id);
		$section = $item->section;
		$division = $section->division;

		$res = $item->delete();
		if($res && $section->count() <= 1){
			$res = $section->delete();
			if($res && $division->count() <= 1){
				$res = $division->delete();
			}
		}

		return Redirect::route('project.save', $division->project_id)
						->with('success', sprintf(trans('common.messages.delete_success'), 'DSI'));
	}

	public function addDSI($id){
		if(!Input::get('code') || !Input::get('name')){
			return Redirect::route('project.save', $id)
						->with('error', sprintf(trans('common.messages.save_error'), 'DSI'));	
		}

		if(Input::get('type') == 'division'){
			$division = new Division();
			$division->code = Input::get('code');
			$division->name = Input::get('name');
			$division->project_id = $id;
			$division->save();
		}elseif(Input::get('type') == 'section' && Input::get('division')){
			$section = new Section();
			$section->code = Input::get('code');
			$section->name = Input::get('name');
			$section->division_id = Input::get('division');
			$section->save();
		}elseif(Input::get('type') == 'item' && Input::get('section')){
			$item = new Item();
			$item->code = Input::get('code');
			$item->name = Input::get('name');
			$item->quantity = Input::get('quantity');
			$item->unit = Input::get('unit');
			$item->unit_rate = Input::get('unit_rate');
			$item->amount = Input::get('amount');
			$item->section_id = Input::get('section');
			$item->save();
		}else{
			return Redirect::route('project.save', $id)
						->with('error', sprintf(trans('common.messages.save_error'), 'DSI'));
		}

		return Redirect::route('project.save', $id)
						->with('success', sprintf(trans('common.messages.save_success'), 'DSI'));			
	}

	public function importDSI($id){
		$message = 'Failed, there should be one sheet, titles row and at least 1 data row';
		$file = Input::file('file') ? Input::file('file')->getRealPath() : '';

		if($file){
			Excel::load($file, function($reader) use($id, &$message) {
				$sheets = $reader->get();
				$rows = $sheets->first();

				$oldRow = null;
				$division = null;
				$section = null;
				$item = null;

				DB::beginTransaction();
				Division::where('project_id', $id)->delete();

				foreach($rows as $row){
					if(!isset($row->division_name) || !isset($row->division_code) || !isset($row->section_name) || !isset($row->section_code) || !isset($row->item_name) || !isset($row->item_code) || !isset($row->quantity) || !isset($row->unit) || !isset($row->unit_rate) || !isset($row->amount)){
						$message = 'Failed, column name are wrong';
						break;
					}

					if(empty($row->division_name) || empty($row->division_code) || empty($row->section_name) || empty($row->section_code) || empty($row->item_name)|| empty($row->item_code)){
						continue;
					}

					$message = 'Success, the data has been imported';

					try{

						if(!$oldRow || $oldRow->division_code != $row->division_code){
							$division = new Division();
							$division->code = $row->division_code;
							$division->name = $row->division_name;
							$division->project_id = $id;
							$division->save();
						}

						if(!$oldRow || $oldRow->division_code != $row->division_code || $oldRow->section_code != $row->section_code){
							$section = new Section();
							$section->code = $row->section_code;
							$section->name = $row->section_name;
							$division->sections()->save($section);
						}

						if($section){
							$item = new Item();
							$item->code = $row->item_code;
							$item->name = $row->item_name;
							$item->quantity = $row->quantity;
							$item->unit = $row->unit;
							$item->unit_rate = $row->unit_rate;
							$item->amount = $row->amount;
							$section->items()->save($item);
						}

					}catch(\Exception $e){
						$message = 'Failed, error in saving data';
					}

					$oldRow = $row;
				}
			});
		}else{
			$message = 'Failed, error uploading the file';
		}

		DB::commit();
		return Redirect::route('project.save', $id)
						->with('success', $message);
	}

	public function export(){
		Excel::create('Projects', function($excel){
			$excel->setTitle('ICM System Projects');
			$excel->sheet('All Projects', function($sheet){
				$projects = Project::all();
				$sheet->fromArray($projects->toArray());
			});
		})->download('xls');
	}

	public function import(){
		
	}

}