<?php

class Price extends Eloquent {

	protected $table = 'prices';
	protected $guarded = array('id');

	public function model()
    {
        return $this->morphTo();
    }
    
}