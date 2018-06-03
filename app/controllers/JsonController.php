<?php



class JsonController extends BaseController {

	

	public function divisions($id){

		$divisions = Project::find($id)->divisions()->select('id as key', DB::raw('CONCAT(code, " - ", name) as value'))->get();

		return Response::Json($divisions->toArray());

	}



	public function sections($id, $divionId){

		$sections = Project::find($id)->divisions()->find($divionId)->sections()->select('id as key', DB::raw('CONCAT(code, " - ", name) as value'))->get();

		return Response::Json($sections->toArray());	

	}



	public function items($id, $divionId, $sectionId){

		$items = Project::find($id)->divisions()->find($divionId)->sections()->find($sectionId)->items()->select('id as key', DB::raw('CONCAT(code, " - ", name) as value'))->get();

		return Response::Json($items->toArray());	

	}



	public function materials($id = null){

		$materials = Supplier::find($id)->materials()->join('units', 'materials.unit_id', '=', 'units.id')->select('materials.id as key', DB::raw('CONCAT(materials.name_arabic, " - ", materials.name, " (", materials.price, "/", units.name, ")") as value'))->get();

		return Response::Json($materials->toArray());	

	}

	

	public function unit($id = null){

		$unit = Material::find($id)->unit()->select('units.id as key', DB::raw('CONCAT(units.name, " - ", units.name_arabic) as value'))->get();

		return Response::Json($unit->toArray());

	}



	public function unitPrice($id = null){

		

		$price = Material::select('materials.id as key', DB::raw('materials.price as value'))->where('id', $id)->get();

		return Response::Json($price->toArray());

	}

}

