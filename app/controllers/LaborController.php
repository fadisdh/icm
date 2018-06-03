<?php



class LaborController extends BaseController {



	public function all(){

		$labors = Labor::paginate(15);
		return View::make('labors.all')->with('labors', $labors);
	}

	

	public function view($id){

		$labor = Labor::find($id);
		return View::make('labors.view')->with('labor', $labor);
	}

	public function save($id){

		if($id == 0){
			$labor = new Labor;
		}else{
			$labor = Labor::find($id);
		}

		return View::make('labors.save')->with('labor', $labor);
	}



	public function savePost($id){

		if($id == 0){
			$labor = new Labor;
		}else{
			$labor = Labor::find($id);
		}

		$validator = Labor::validate($id, Input::all());

		if ($validator->fails()){
	    	return Redirect::route('labor.save', $id)->withErrors($validator)->withInput();
	    }

	    $labor->project_id = null;
	    $labor->user_id = 1;

	    $labor->name = Input::get('name');
	    $labor->name_arabic = Input::get('name_arabic');
	    $labor->nationality = Input::get('nationality');
	    $labor->occupation_id = Input::get('occupation');
	    $labor->residency_type = Input::get('residency_type');
	    $labor->civil_id = Input::get('civil_id');
	    $labor->phone = Input::get('phone');
	    $labor->note = Input::get('note');

		$res = $labor->save();

		if($res) {
			$prices = Input::get('price');
			$units = Input::get('unit');
			$price_validity_froms = Input::get('price_validity_from');
			$price_validity_tos = Input::get('price_validity_to');

			foreach ($prices as $key => $value) {
				$price = Price::find($key);

				if(is_null($price)){
					$price = new Price;
				}

				$price->price = $value;
				$price->unit = $units[$key];
				$price->price_validity_from = new DateTime($price_validity_froms[$key]);
				$price->price_validity_to = new DateTime( $price_validity_tos[$key]);
				$labor->prices()->save($price);
			}

			//Civil Id Attachment
			if (Input::hasFile('civil_id')){
	    		$civil_id = Input::file('civil_id');
	   			
	   			//delete existing attachment
	    		$attachment = Attachment::where('model_id', '=', $labor->id)
	    								  ->where('model_type', '=', 'Labor')->first();

	    		if($attachment) $attachment->delete();

	   			$attachment = new Attachment;

				$attachment->link = upload($civil_id, Labor::getDir($labor->id));
				$attachment->model_id = $labor->id;
				$attachment->model_type = 'Labor';

				$labor->attachments()->save($attachment);
			}

			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.labor'));
		}else{
			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.labor'));
		}

		return Redirect::route('labors')
				->with('action', 'action')
				->with('result', $res)
				->with('message', $message);
	}

	public function delete($id){

		$labor = Labor::find($id);
		$res = $labor->delete();

		if($res) {
			$message = sprintf(trans('common.messages.delete_success'), trans('common.labor'));
		}else{
			$message = sprintf(trans('common.messages.delete_success'), trans('common.labor'));
		}

		return Redirect::route('labors')
				->with('action', 'action')
				->with('result', $res)
				->with('message', $message);
	}



	public function export(){

		Excel::create('Labors', function($excel){

			$excel->setTitle('ICM System Labors');

			$excel->sheet('All Labors', function($sheet){

				$labors = Labor::all();

				$sheet->fromArray($labors->toArray());

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

        	$filePath = public_path('uploads/labors/' . $attachment->model_id .'/' . $attachment->link);

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