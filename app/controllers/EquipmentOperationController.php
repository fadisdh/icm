<?php
	
class EquipmentOperationController extends BaseController {

	public function all(){
		
		$operations = EquipmentOperation::paginate(15);

		return View::make('operations.equipments.all')->with('operations', $operations);
	}

	public function save($id){


		if($id == 0){

			$operation = new EquipmentOperation;

		}else{

			$operation = EquipmentOperation::find($id);

		}

		return View::make('operations.equipments.save')->with('operation', $operation);

	}


	public function savePost($id){
	
		//return Input::all();

		if($id == 0){

			$equipmentOp = new EquipmentOperation;

		}else{

			$equipmentOp = EquipmentOperation::find($id);

		}


		$validator = EquipmentOperation::validate($id, Input::all());


		if ($validator->fails())

	    {

	    	return Redirect::route('equipment.operation.save', $id)->withErrors($validator)->withInput();

	    }

	    $equipmentOp->project_id = null;

	    $equipmentOp->user_id = 1;	    

	    $equipmentOp->date_operation = new DateTime(Input::get('date_operation'));

		$equipmentOp->operation = Input::get('operation');

		
		//Source // Receiver
		$equipment = Input::get('equipment');
		$type = Input::get('type');
		$source = Input::get('source');
		$receiver = Input::get('receiver');
		$project_location = Input::get('project_location');
		$quantity = Input::get('quantity');

		if(Input::get('operation') == 'out'){

			$equipmentOp->type = $type['out'];
			$equipmentOp->source = $source['out'];
			$equipmentOp->receiver = $receiver['out'];
			$equipmentOp->project_location = $project_location['out'];

			if($type['out'] == 'company_equipment'){

				$equipmentOp->equipment_id = $equipment['out_company_equipment'];

				$equipmentOp->quantity = 1;

			}elseif($type['out'] == 'subcontractors_equipment'){

				$equipmentOp->equipment_name = $equipment['out_subcontractors_equipment'];

				$equipmentOp->quantity = $quantity['out_subcontractors_equipment'];

			}elseif($type['out'] == 'equipment_rental'){

				$equipmentOp->equipment_name = $equipment['out_equipment_rental'];

				$equipmentOp->quantity = $quantity['out_equipment_rental'];				
			}
			

		}
		
		if(Input::get('operation') == 'in'){

			$equipmentOp->type = $type['in'];

			if($type['in'] == 'company_equipment'){
				
				if($source['company_equipment'] == 'project'){

					$equipmentOp->project_location = $project_location['company_equipment'];

				}

				$equipmentOp->source = $source['company_equipment'];
				$equipmentOp->receiver = $receiver['company_equipment'];
				$equipmentOp->quantity = 1;

				$equipmentOp->equipment_id = $equipment['in_company_equipment'];

			}elseif($type['in'] == 'subcontractors_equipment'){

				$equipmentOp->source = $source['subcontractors_equipment'];
				$equipmentOp->receiver = $receiver['subcontractors_equipment'];
				$equipmentOp->quantity = $quantity['subcontractors_equipment'];

				$equipmentOp->equipment_name = $equipment['in_subcontractors_equipment'];

			}elseif($type['in'] == 'equipment_rental'){

				$equipmentOp->source = $source['equipment_rental'];
				$equipmentOp->receiver = $receiver['equipment_rental'];
				$equipmentOp->quantity = $quantity['equipment_rental'];

				$equipmentOp->equipment_name = $equipment['in_equipment_rental'];
			}
		}

		$equipmentOp->condition = Input::get('condition');

		$equipmentOp->transportar_name = Input::get('transportar_name');


		$equipmentOp->division_id = null;
		$equipmentOp->section_id = null;
		$equipmentOp->item_id = null;

		$res = $equipmentOp->save();

		if($res){

			//receipt
			if (Input::hasFile('receipt')){
	    		$receipt = Input::file('receipt');
	   			
	   			//delete existing attachment
	    		$attachment = Attachment::where('model_id', '=', $equipmentOp->id)
	    								  ->where('model_type', '=', 'EquipmentOperation')->first();

	    		if($attachment) $attachment->delete();

	   			$attachment = new Attachment;

				$attachment->link = upload($receipt, EquipmentOperation::getDir($equipmentOp->id));
				$attachment->model_id = $equipmentOp->id;
				$attachment->model_type = 'EquipmentOperation';

				$equipmentOp->attachments()->save($attachment);
			}

			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.equipment'));

		}else{

			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.equipment'));

		}

		return Redirect::route('equipments.operations')

				->with('action', 'action')

				->with('result', $res)

				->with('message', $message);


	}


	public function delete($id){



		$operation = EquipmentOperation::find($id);
		
		$id = $operation->equipment_id;

		$res = $operation->delete();


		if($res) {

			$message = sprintf(trans('common.messages.delete_success'), trans('common.operation'));

		}else{

			$message = sprintf(trans('common.messages.delete_unsuccess'), trans('common.operation'));

		}



		return Redirect::route('equipment.operations', $id)

				->with('action', 'action')

				->with('result', $res)

				->with('message', $message);

	}

}