<?php

class SectionController extends BaseController {

	public function all(){
		return View::make('sections.all');
	}
	
	public function view($id){
		$section = Section::find($id);
		return View::make('sections.view')->with('section', $section);
	}

	public function save($id){

		if($id == 0){
			$section = new Section;
		}else{
			$section = Section::find($id);
		}
		return View::make('sections.save')->with('section', $section);
	}

	public function savePost($id, $division_id){
		
		if($id == 0){
			$section = new Section;
		}else{
			$section = Section::find($id);
		}

		$validator = Section::validate(Input::all());

		if ($validator->fails())
	    {
	    	return Redirect::route('sections.save')->withErrors($validator)->withInput();
	    }
	    
	    $section->division_id = $division_id;

	    $section->name = Input::get('name');


		$res = $section->save();

		if($res) {
			return Redirect::route('sections.all');
		} else {
			return View::make('common.error');
		}
	}

	public function delete($id){

		$section = Section::find($id);
		$section->delete();

		return Redirect::route('sections.all');
	}
}