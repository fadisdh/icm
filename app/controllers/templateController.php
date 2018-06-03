<?php

class TemplateController extends BaseController {

	public function all(){
		return View::make('templates.all');
	}
	
	public function view($id){
		$template = Template::find($id);
		return View::make('templates.view')->with('template', $template);
	}

	public function save($id){

		if($id == 0){
			$template = new Template;
		}else{
			$template = Template::find($id);
		}
		return View::make('templates.save')->with('template', $template);
	}

	public function savePost($id){
		
		if($id == 0){
			$template = new Template;
		}else{
			$template = Template::find($id);
		}

		$validator = Template::validate(Input::all());

		if ($validator->fails())
	    {
	    	return Redirect::route('templates.save')->withErrors($validator)->withInput();
	    }

		$res = $template->save();

		if($res) {
			return Redirect::route('templates.all');
		} else {
			return View::make('common.error');
		}
	}

	public function delete($id){

		$template = Template::find($id);
		$template->delete();

		return Redirect::route('templates.all');
	}

	public function export(){
		Excel::create('Users', function($excel){
			$excel->setTitle('ICM System Users');
			$excel->sheet('All Users', function($sheet){
				$users = User::all();
				$sheet->fromArray($users->toArray());
			});
		})->download('xls');
	}

	public function import(){
		
	}
}