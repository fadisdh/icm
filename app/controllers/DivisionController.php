<?php

class DivisionController extends BaseController {

	public function all(){
		return View::make('divisions.all');
	}
	
	public function view($id){
		$division = Division::find($id);
		return View::make('divisions.view')->with('division', $division);
	}

	public function save($id){

		if($id == 0){
			$division = new Division;
		}else{
			$division = Division::find($id);
		}
		return View::make('divisions.save')->with('division', $division);
	}

	public function savePost($id, $project_id){
		
		if($id == 0){
			$division = new Division;
		}else{
			$division = Division::find($id);
		}

		$validator = Division::validate(Input::all());

		if ($validator->fails())
	    {
	    	return Redirect::route('divisions.save')->withErrors($validator)->withInput();
	    }
	    
	    $division->project_id = $project_id;

		$res = $division->save();

		if($res) {
			return Redirect::route('divisions.all');
		} else {
			return View::make('common.error');
		}
	}

	public function delete($id){

		$division = Division::find($id);
		$division->delete();

		return Redirect::route('divisions.all');
	}
}