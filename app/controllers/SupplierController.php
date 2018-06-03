<?php



class SupplierController extends BaseController {



	public function all(){

		

		$suppliers = Supplier::paginate(15);



		return View::make('suppliers.all')->with('suppliers', $suppliers);

	}

	

	public function view($id){

		$supplier = Supplier::find($id);

		return View::make('suppliers.view')->with('supplier', $supplier);

	}



	public function save($id){
		


		if($id == 0){

			$supplier = new Supplier;

		}else{

			$supplier = Supplier::with('contact_persons')->find($id);

		}

		return View::make('suppliers.save')->with('supplier', $supplier);

	}



	public function savePost($id){

		if($id == 0){

			$supplier = new Supplier;

		}else{

			$supplier = Supplier::find($id);

		}

		$validator = Supplier::validate($id, Input::all());


		if ($validator->fails())

	    {

	    	return Redirect::route('supplier.save', $id)->withErrors($validator)->withInput();

	    }

	    $supplier->project_id = null;

	    $supplier->user_id	= 1;

	    $supplier->name = Input::get('name');

	    $supplier->name_arabic = Input::get('name_arabic');

	    $supplier->type = Input::get('type');



		$res = $supplier->save();



		if($res) {

			$contactPersons = ContactPerson::where('supplier_id', '=', $supplier->id)->get();

			foreach ($contactPersons as $cp) {

				$cp->delete();

			}

			$phones = Input::get('phone');

			$faxes	= Input::get('fax');

			$emails = Input::get('email');



			foreach (Input::get('contact_person') as $key => $value) {

				if($value){

					$cp = new ContactPerson;

					$cp->name = $value;

					$cp->supplier_id = $supplier->id;

					$cp->phone = $phones[$key];

					$cp->fax = $faxes[$key];

					$cp->email = $emails[$key];

					

					$cp->save();

				}

			}

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
							$att->link = upload($file, Supplier::getDir($supplier->id));
				        }

				        $att->model_id = $supplier->id;
						$att->model_type = 'Supplier';
						$att->title = $val;
						$att->save();
				    }
				}
			}

			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.supplier'));

		}else{

			$message = sprintf($id == 0 ? trans('common.messages.add_success') : trans('common.messages.edit_success'), trans('common.supplier'));

		}



		return Redirect::route('suppliers')

				->with('action', 'action')

				->with('result', $res)

				->with('message', $message);

	}



	public function delete($id){



		$supplier = Supplier::find($id);

		$res = $supplier->delete();



		if($res) {

			$message = sprintf(trans('common.messages.delete_success'), trans('common.supplier'));

		}else{

			$message = sprintf(trans('common.messages.delete_success'), trans('common.supplier'));

		}



		return Redirect::route('suppliers')

				->with('action', 'action')

				->with('result', $res)

				->with('message', $message);

	}



	public function json(){

		

		$suppliers = Supplier::select('id','name')->get();



		return Response::json($suppliers);

	}



	public function export(){

		Excel::create('Suppliers', function($excel){

			$excel->setTitle('ICM System Suppliers');

			$excel->sheet('All Suppliers', function($sheet){

				$suppliers = Supplier::all();

				$sheet->fromArray($suppliers->toArray());

			});

		})->download('xls');

	}



	public function import(){

		

	}

}