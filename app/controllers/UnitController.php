<?php



class UnitController extends BaseController {



	public function all(){

		

		$units = Unit::paginate(15);



		return View::make('units.all')->with('units', $units);

	}

	

	public function view($id){

		$unit = Unit::find($id);

		return View::make('units.view')->with('unit', $unit);

	}



	public function save($id){



		if($id == 0){

			$unit = new Unit;

		}else{

			$unit = Unit::find($id);

		}



		return View::make('units.save')->with('unit', $unit);

	}



	public function savePost($id){



		if($id == 0){

			$unit = new Unit;

		}else{

			$unit = Unit::find($id);

		}



		$validator = Unit::validate($id, Input::all());



		if ($validator->fails())

	    {

	    	return Redirect::route('unit.save', $id)->withErrors($validator)->withInput();

	    }



	    $unit->project_id = null;

	    $unit->user_id = 1;

	    $unit->name = Input::get('name');

	    $unit->name_arabic = Input::get('name_arabic');



		$res = $unit->save();



		if($res) {

			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.unit'));

		}else{

			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.unit'));

		}



		return Redirect::route('units')

				->with('action', 'action')

				->with('result', $res)

				->with('message', $message);

	}



	public function delete($id){



		$unit = Unit::find($id);

		$res = $unit->delete();



		if($res) {

			$message = sprintf(trans('common.messages.delete_success'), trans('common.unit'));

		}else{

			$message = sprintf(trans('common.messages.delete_success'), trans('common.unit'));

		}



		return Redirect::route('units')

				->with('action', 'action')

				->with('result', $res)

				->with('message', $message);

	}



	public function export(){

		Excel::create('Units', function($excel){

			$excel->setTitle('ICM System Units');

			$excel->sheet('All Units', function($sheet){

				$units = Unit::all();

				$sheet->fromArray($units->toArray());

			});

		})->download('xls');

	}



	public function import(){

		

	}

}