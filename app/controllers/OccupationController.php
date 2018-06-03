<?php



class OccupationController extends BaseController {



	public function all(){

		

		$occupations = Occupation::paginate(15);



		return View::make('occupations.all')->with('occupations', $occupations);

	}

	

	public function view($id){

		$occupation = Occupation::find($id);

		return View::make('occupations.view')->with('occupation', $occupation);

	}



	public function save($id){



		if($id == 0){

			$occupation = new Occupation;

		}else{

			$occupation = Occupation::find($id);

		}

		return View::make('occupations.save')->with('occupation', $occupation);

	}



	public function savePost($id){

		

		if($id == 0){

			$occupation = new Occupation;

		}else{

			$occupation = Occupation::find($id);

		}



		$validator = Occupation::validate($id, Input::all());



		if ($validator->fails())

	    {

	    	return Redirect::route('occupation.save', $id)->withErrors($validator)->withInput();

	    }



		$occupation->project_id = null;

	    $occupation->user_id = 1;

	    

		$occupation->name = Input::get('name');

		$occupation->name_arabic = Input::get('name_arabic');

		

		$res = $occupation->save();



		if($res) {

			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.occupation'));

		}else{

			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.occupation'));

		}



		return Redirect::route('occupations')

				->with('action', 'action')

				->with('result', $res)

				->with('message', $message);

	}



	public function delete($id){



		$occupation = Occupation::find($id);

		$res = $occupation->delete();



		if($res) {

			$message = sprintf(trans('common.messages.delete_success'), trans('common.occupation'));

		}else{

			$message = sprintf(trans('common.messages.delete_success'), trans('common.occupation'));

		}



		return Redirect::route('occupations')

				->with('action', 'action')

				->with('result', $res)

				->with('message', $message);

	}



	public function export(){

		Excel::create('Occupations', function($excel){

			$excel->setTitle('ICM System Occupations');

			$excel->sheet('All Occupations', function($sheet){

				$occupation = Occupation::all();

				$sheet->fromArray($occupation->toArray());

			});

		})->download('xls');

	}



	public function import(){

		

	}

}