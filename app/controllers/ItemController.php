<?php

class ItemController extends BaseController {

	public function all(){
		return View::make('items.all');
	}
	
	public function view($id){
		$item = Item::find($id);
		return View::make('items.view')->with('item', $item);
	}

	public function save($id){

		if($id == 0){
			$item = new Item;
		}else{
			$item = Item::find($id);
		}
		return View::make('items.save')->with('item', $item);
	}

	public function savePost($id, $section_id){
		
		if($id == 0){
			$item = new Item;
		}else{
			$item = Item::find($id);
		}

		$validator = Item::validate(Input::all());

		if ($validator->fails())
	    {
	    	return Redirect::route('items.save')->withErrors($validator)->withInput();
	    }
	    
	    $item->section_id = $section_id;

	    $item->name = Input::get('name');

		$res = $item->save();

		if($res) {
			return Redirect::route('items.all');
		} else {
			return View::make('common.error');
		}
	}

	public function delete($id){

		$item = Item::find($id);
		$item->delete();

		return Redirect::route('items.all');
	}
}