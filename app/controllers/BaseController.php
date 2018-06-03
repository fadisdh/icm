<?php

class BaseController extends Controller {

	private $data = array();

	protected function share($key, $val){
		View::share($key, $val);
	}

	protected function setTitle($val){
		View::share('pageTitle', $val);
	}

	protected function setClass($val){
		View::share('pageClass', $val);
	}

	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
