<?php



class MaterialController extends BaseController {



	public function all(){

		

		$materials = Material::paginate(15);



		return View::make('materials.all')->with('materials', $materials);

	}

	

	public function view($id){

		$material = Material::find($id);

		return View::make('materials.view')->with('material', $material);

	}



	public function save($id){



		if($id == 0){

			$material = new Material;

		}else{

			$material = Material::find($id);

		}



		return View::make('materials.save')->with('material', $material);

	}



	public function savePost($id){

		if($id == 0){

			$material = new Material;

		}else{

			$material = Material::find($id);

		}

		$validator = Material::validate($id, Input::all());

		if ($validator->fails())

	    {

	    	return Redirect::route('material.save', $id)->withErrors($validator)->withInput();

	    }



		$material->project_id = null;

	    $material->user_id = 1;	


		$material->name = Input::get('name');

		$material->name_arabic = Input::get('name_arabic');

		$material->supplier_id = Input::get('supplier_id');

		$material->country = Input::get('country');

		$material->unit_id = Input::get('unit_id');

		$material->price = Input::get('price');

		$material->validity_from = new DateTime(Input::get('validity_from'));

		$material->validity_to = new DateTime(Input::get('validity_to'));

		$material->quotation_reference = Input::get('quotation_reference');

		$material->note = Input::get('note');

		$res = $material->save();

		if($res) {

			// QR Attachment
			if (Input::hasFile('qr_attachment')){
	    		$qr_attachment = Input::file('qr_attachment');
	   			
	   			//delete existing attachment
	    		$attachment = Attachment::where('model_id', '=', $material->id)
	    								  ->where('model_type', '=', 'Material')->first();

	    		if($attachment) $attachment->delete();

	   			$attachment = new Attachment;

				$attachment->link = upload($qr_attachment, Material::getDir($material->id));
				$attachment->model_id = $material->id;
				$attachment->model_type = 'Material';

				$material->attachments()->save($attachment);
			}

			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.material'));

		}else{

			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.material'));

		}



		return Redirect::route('materials')

				->with('action', 'action')

				->with('result', $res)

				->with('message', $message);

	}



	public function delete($id){



		$material = Material::find($id);

		$res = $material->delete();



		if($res) {

			$message = sprintf(trans('common.messages.delete_success'), trans('common.material'));

		}else{

			$message = sprintf(trans('common.messages.delete_success'), trans('common.material'));

		}



		return Redirect::route('materials')

				->with('action', 'action')

				->with('result', $res)

				->with('message', $message);

	}



	public function export(){

		Excel::create('Materials', function($excel){

			$excel->setTitle('ICM System Materials');

			$excel->sheet('All Materials', function($sheet){

				$material = Material::all();

				$sheet->fromArray($material->toArray());

			});

		})->download('xls');

	}



	public function import(){

		

	}

	public function download($id){

		$notFoundTitle = "File not found";
		$notFound = "The provided file path is not valid.";

        $attachment = Attachment::find($id);
        
        if($attachment){

        	$filePath = public_path('uploads/materials/' . $attachment->model_id .'/' . $attachment->link);

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