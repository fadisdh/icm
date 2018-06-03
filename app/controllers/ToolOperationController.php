<?php
	
class ToolOperationController extends BaseController {

	public function all(){
		
		$operations = ToolOperation::paginate(15);

		return View::make('operations.tools.all')->with('operations', $operations);
	}

	public function save($id){


		if($id == 0){

			$operation = new ToolOperation;

		}else{

			$operation = ToolOperation::find($id);

		}

		return View::make('operations.tools.save')->with('operation', $operation);

	}


	public function savePost($id){
	
		//return Input::all();

		if($id == 0){

			$toolOp = new ToolOperation;

		}else{

			$toolOp = ToolOperation::find($id);

		}


		$validator = ToolOperation::validate($id, Input::all());


		if ($validator->fails())

	    {

	    	return Redirect::route('tool.operation.save', $id)->withErrors($validator)->withInput();

	    }

	    $toolOp->project_id = null;

	    $toolOp->user_id = 1;	    

	    $toolOp->date_operation = new DateTime(Input::get('date_operation'));

		$toolOp->operation = Input::get('operation');

		
		//Source // Receiver
		$tool = Input::get('tool');
		$type = Input::get('type');
		$source = Input::get('source');
		$receiver = Input::get('receiver');
		$project_location = Input::get('project_location');
		$quantity = Input::get('quantity');

		if(Input::get('operation') == 'out'){

			$toolOp->type = $type['out'];
			$toolOp->source = $source['out'];
			$toolOp->receiver = $receiver['out'];
			$toolOp->project_location = $project_location['out'];

			if($type['out'] == 'company_tool'){

				$toolOp->tool_id = $tool['out_company_tool'];

				$toolOp->quantity = 1;

			}elseif($type['out'] == 'subcontractors_tool'){

				$toolOp->tool_name = $tool['out_subcontractors_tool'];

				$toolOp->quantity = $quantity['out_subcontractors_tool'];

			}elseif($type['out'] == 'tool_rental'){

				$toolOp->tool_name = $tool['out_tool_rental'];

				$toolOp->quantity = $quantity['out_tool_rental'];				
			}
			

		}
		
		if(Input::get('operation') == 'in'){

			$toolOp->type = $type['in'];

			if($type['in'] == 'company_tool'){
				
				if($source['company_tool'] == 'project'){

					$toolOp->project_location = $project_location['company_tool'];

				}

				$toolOp->source = $source['company_tool'];
				$toolOp->receiver = $receiver['company_tool'];
				$toolOp->quantity = 1;

				$toolOp->tool_id = $tool['in_company_tool'];

			}elseif($type['in'] == 'subcontractors_tool'){

				$toolOp->source = $source['subcontractors_tool'];
				$toolOp->receiver = $receiver['subcontractors_tool'];
				$toolOp->quantity = $quantity['subcontractors_tool'];

				$toolOp->tool_name = $tool['in_subcontractors_tool'];

			}elseif($type['in'] == 'tool_rental'){

				$toolOp->source = $source['tool_rental'];
				$toolOp->receiver = $receiver['tool_rental'];
				$toolOp->quantity = $quantity['tool_rental'];

				$toolOp->tool_name = $tool['in_tool_rental'];
			}
		}

		$toolOp->condition = Input::get('condition');

		$toolOp->transportar_name = Input::get('transportar_name');


		$toolOp->division_id = null;
		$toolOp->section_id = null;
		$toolOp->item_id = null;

		$res = $toolOp->save();

		if($res){

			//receipt
			if (Input::hasFile('receipt')){
	    		$receipt = Input::file('receipt');
	   			
	   			//delete existing attachment
	    		$attachment = Attachment::where('model_id', '=', $toolOp->id)
	    								  ->where('model_type', '=', 'ToolOperation')->first();

	    		if($attachment) $attachment->delete();

	   			$attachment = new Attachment;

				$attachment->link = upload($receipt, ToolOperation::getDir($toolOp->id));
				$attachment->model_id = $toolOp->id;
				$attachment->model_type = 'ToolOperation';

				$toolOp->attachments()->save($attachment);
			}

			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.tool'));

		}else{

			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.tool'));

		}

		return Redirect::route('tools.operations')

				->with('action', 'action')

				->with('result', $res)

				->with('message', $message);


	}


	public function delete($id){



		$operation = ToolOperation::find($id);
		
		$id = $operation->tool_id;

		$res = $operation->delete();


		if($res) {

			$message = sprintf(trans('common.messages.delete_success'), trans('common.operation'));

		}else{

			$message = sprintf(trans('common.messages.delete_unsuccess'), trans('common.operation'));

		}



		return Redirect::route('tool.operations', $id)

				->with('action', 'action')

				->with('result', $res)

				->with('message', $message);

	}

}