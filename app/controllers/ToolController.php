<?php



class ToolController extends BaseController {



	public function all(){

		

		$tools = Tool::paginate(15);



		return View::make('tools.all')->with('tools', $tools);

	}

	

	public function view($id){

		$tool = Tool::find($id);

		return View::make('tools.view')->with('tool', $tool);

	}



	public function save($id){



		if($id == 0){

			$tool = new Tool;

		}else{

			$tool = Tool::find($id);

		}

		return View::make('tools.save')->with('tool', $tool);

	}



	public function savePost($id){

		

		if($id == 0){

			$tool = new Tool;

		}else{

			$tool = Tool::find($id);

		}



		$validator = Tool::validate($id, Input::all());



		if ($validator->fails())

	    {

	    	return Redirect::route('tool.save', $id)->withErrors($validator)->withInput();

	    }

	    

	    $tool->project_id = null;

	    $tool->user_id	= 1;



	    $tool->name = Input::get('name');

	    $tool->name_arabic = Input::get('name_arabic');

	    $tool->type = Input::get('type');	    



	    if(Input::get('type') == 'company_equipment'){

	    	$tool->source = Input::get('company_equipment');

	    }elseif(Input::get('type') == 'subcontractors_equipment'){

	    	$tool->source = Input::get('subcontractors_equipment');

	    }elseif(Input::get('type') == 'equipment_rental'){

	    	$tool->source = Input::get('equipment_rental');

	    }



	    $tool->description = Input::get('description');

	    $tool->unit = Input::get('unit');

	    $tool->unit_rate = Input::get('unit_rate');

	    $tool->quantity = intval(Input::get('quantity'));

	    $tool->price_validity_from = new DateTime(Input::get('price_validity_from'));

	    $tool->price_validity_to = new DateTime(Input::get('price_validity_to'));



		$res = $tool->save();



		if($res) {

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
							$att->link = upload($file, Tool::getDir($tool->id));
				        }

				        $att->model_id = $tool->id;
						$att->model_type = 'Tool';
						$att->title = $val;
						$att->save();
				    }
				}
			}

			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.tool'));

		}else{

			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.tool'));

		}



		return Redirect::route('tools')

				->with('action', 'action')

				->with('result', $res)

				->with('message', $message);

	}



	public function delete($id){



		$tool = Tool::find($id);

		$res = $tool->delete();



		if($res) {

			$message = sprintf(trans('common.messages.delete_success'), trans('common.tool'));

		}else{

			$message = sprintf(trans('common.messages.delete_success'), trans('common.tool'));

		}



		return Redirect::route('tools')

				->with('action', 'action')

				->with('result', $res)

				->with('message', $message);

	}



	public function export(){

		Excel::create('Tools', function($excel){

			$excel->setTitle('ICM System Tools');

			$excel->sheet('All Tools', function($sheet){

				$tools = Tool::all();

				$sheet->fromArray($tools->toArray());

			});

		})->download('xls');

	}



	public function import(){

		

	}

	// Operations 

	public function operations($id){
		

		$operations = ToolOperation::where('tool_id', '=', $id)->paginate(15);

		return View::make('tools.operations.all')->with('operations', $operations)
													->with('tool', $id);

	}

	public function saveOperation($tool, $id){


		if($id == 0){

			$operation = new ToolOperation;

		}else{

			$operation = ToolOperation::find($id);

		}

		return View::make('tools.operations.save')->with('operation', $operation)
														->with('tool', $tool);

	}


	public function savePostOperation($tool, $id){

		
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

	    $toolOp->tool_id = $tool;

	    $toolOp->date_operation = new DateTime(Input::get('date_operation'));

		$toolOp->type = Input::get('type');

		$toolOp->operation = Input::get('operation');

		$toolOp->source = Input::get('source');

		$toolOp->quantity = Input::get('quantity');

		$toolOp->receiver = Input::get('receiver');

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

				$attachment->link = upload($receipt, ToolOperation::getDir($eq, $toolOp->id));
				$attachment->model_id = $toolOp->id;
				$attachment->model_type = 'ToolOperation';

				$toolOp->attachments()->save($attachment);
			}

			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.equipment'));

		}else{

			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.equipment'));

		}

		return Redirect::route('tool.operations', $tool)

				->with('action', 'action')

				->with('result', $res)

				->with('message', $message);


	}


	public function deleteOperation($id){



		$operation = ToolOperation::find($id);

		$res = $operation->delete();


		if($res) {

			$message = sprintf(trans('common.messages.delete_success'), trans('common.operation'));

		}else{

			$message = sprintf(trans('common.messages.delete_unsuccess'), trans('common.operation'));

		}



		return Redirect::route('operation')

				->with('action', 'action')

				->with('result', $res)

				->with('message', $message);

	}

	public function downloadOp($id){

		$notFoundTitle = "File not found";
		$notFound = "The provided file path is not valid.";

        $attachment = Attachment::find($id);

        $toolOp = ToolOperation::find($attachment->model_id);
        
        if($attachment){

        	$filePath = public_path('uploads/tools/' . $toolOp->tool_id .'/operations/'. $toolOp->id . '/' . $attachment->link);

	        if(file_exists($filePath)) {
	            
	            $fileName = basename($filePath);
	            $fileSize = filesize($filePath);

	            // Output headers.
	            header("Cache-Control: private");
	            header("Content-Type: application/stream");
	            header("Content-Length: ".$fileSize);
	            header("Content-Disposition: attachment; filename=".$fileName);

	            // Output file.
	            readfile ($filePath);                   
	            exit();
	        }
	        else {
	             return View::make('common.error')->with('msg', $notFound)->with('title', $notFoundTitle);
	        }
       	}else {
		        return View::make('common.error')->with('msg', $notFound)->with('title', $notFoundTitle);
		}       	
    }

}