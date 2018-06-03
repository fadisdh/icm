<?php



class AttachmentController extends BaseController {



	public function all(){

		

		$attachments = Attachment::paginate(15);



		return View::make('attachments.all')->with('attachments', $attachments);

	}

	

	public function view($id){

		$attachment = Attachment::find($id);

		return View::make('attachments.view')->with('attachment', $attachment);

	}



	public function save($id){



		if($id == 0){

			$attachment = new Attachment;

		}else{

			$attachment = Attachment::find($id);

		}

		return View::make('attachments.save')->with('attachment', $attachment);

	}



	public function savePost($id){


		if($id == 0){

			$attachment = new Attachment;

		}else{

			$attachment = Attachment::find($id);

		}



		$validator = Attachment::validate(Input::all());



		if ($validator->fails())

	    {

	    	return Redirect::route('attachments.save')->withErrors($validator)->withInput();

	    }

		$res = $attachment->save();

		$attachment->project_id = $project_id;

		$attachment->supplier_name = Input::get('supplier_name');

		$attachment->name = Input::get('name');

		



		if($res) {

			return Redirect::route('attachments.all');

		} else {

			return View::make('common.error');

		}

	}



	public function delete($id){

		$attachment = Attachment::find($id);

		$attachment->delete();

		return Redirect::back();

	}


	public function download($id){

		$notFoundTitle = "File not found";
		$notFound = "The provided file path is not valid.";

        $attachment = Attachment::find($id);
        
        if($attachment){

        	$filePath = public_path('uploads/'. $attachment->model_type .'/' . $attachment->model_id .'/' . $attachment->link);

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