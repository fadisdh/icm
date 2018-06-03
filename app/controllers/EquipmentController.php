<?php



class EquipmentController extends BaseController {



	public function all(){

		

		$equipments = Equipment::paginate(15);



		return View::make('equipments.all')->with('equipments', $equipments);

	}

	

	public function view($id){

		$equipment = Equipment::find($id);

		return View::make('equipments.view')->with('equipment', $equipment);

	}



	public function save($id){



		if($id == 0){

			$equipment = new Equipment;

		}else{

			$equipment = Equipment::find($id);

		}



		return View::make('equipments.save')->with('equipment', $equipment);

	}



	public function savePost($id){

		
		if($id == 0){

			$equipment = new Equipment;

		}else{

			$equipment = Equipment::find($id);

		}


		$validator = Equipment::validate($id, Input::all());



		if ($validator->fails())

	    {

	    	return Redirect::route('equipment.save', $id)->withErrors($validator)->withInput();

	    }



		$equipment->project_id = null;

	    $equipment->user_id = Auth::user()->id;



	    $equipment->name = Input::get('name');

		$equipment->name_arabic = Input::get('name_arabic');

		$equipment->type = Input::get('type');



		if(Input::get('type') == 'company_equipment'){

	    	$equipment->source = Input::get('company_equipment');

	    }elseif(Input::get('type') == 'subcontractors_equipment'){

	    	$equipment->source = Input::get('subcontractors_equipment');

	    }elseif(Input::get('type') == 'equipment_rental'){

	    	$equipment->source = Input::get('equipment_rental');

	    }



		$equipment->description = Input::get('description');

		

		$res = $equipment->save();



		if($res){



			$prices = Input::get('price');

			$units = Input::get('unit');

			$price_validity_froms = Input::get('price_validity_from');

			$price_validity_tos = Input::get('price_validity_to');


			DB::beginTransaction();
			if($prices){
				foreach ($prices as $key => $value) {

					$price = Price::find($key);

					

					if(is_null($price)){

						$price = new Price;

					}


					$price->price = $value;

					$price->unit = isset($units[$key]) ? $units[$key] : '';

					$price->price_validity_from = isset($price_validity_froms[$key]) ? new DateTime($price_validity_froms[$key]) : null;

					$price->price_validity_to = isset($price_validity_tos[$key]) ? new DateTime($price_validity_tos[$key]): null;



					$equipment->prices()->save($price);

				}//endforeach
			}//endif
			DB::commit();

			//Attachments
		    $title = Input::get('title');
			$attachment = Input::file('attachment');
			
			if($title){
				foreach ($title as $key => $val) {
					
					if($val){
						$att = Attachment::find($key);
						
						if(!$att){
							$att = new Attachment();
						}
						
						$file = $attachment[$key];

						if($file){
							$att->link = upload($file, Equipment::getDir($equipment->id));
				        }

				        $att->model_id = $equipment->id;
						$att->model_type = 'Equipment';
						$att->title = $val;
						$att->save();
				    }
				}
			}

			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.equipment'));

		}else{

			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.equipment'));

		}



		return Redirect::route('equipments')

				->with('action', 'action')

				->with('result', $res)

				->with('message', $message);

	}



	public function delete($id){



		$equipment = Equipment::find($id);

		$res = $equipment->delete();



		if($res) {

			$message = sprintf(trans('common.messages.delete_success'), trans('common.equipment'));

		}else{

			$message = sprintf(trans('common.messages.delete_success'), trans('common.equipment'));

		}



		return Redirect::route('equipments')

				->with('action', 'action')

				->with('result', $res)

				->with('message', $message);

	}



	public function export(){

		Excel::create('Equipments', function($excel){

			$excel->setTitle('ICM System Equipments');

			$excel->sheet('All Equipments', function($sheet){

				$equipments = Equipment::all();

				$sheet->fromArray($equipments->toArray());

			});

		})->download('xls');

	}



	public function import(){

		

	}

}