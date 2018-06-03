<?php



class Supplier extends Eloquent {



	protected $table = 'suppliers';

	protected $guarded = array('id');

    protected $tmp = array();



	public function projects()

    {

        return $this->belongsToMany('Project');

    }



    public function contact_persons(){

        return $this->hasMany('ContactPerson');
    }

    public function materials(){

        return $this->hasMany('Material');
    }

    public function attachments(){

        return $this->morphMany('Attachment', 'model');
    }


    public static function getDir($id){
        return sprintf(Config::get('vars/paths.supplier'), $id);
    }

    public function getFullPath(){
        $attachment = Attachment::where('model_id', '=', $this->id)
                                ->where('model_type', '=', 'Supplier')->first();

        return URL::route('supplier.attachment.download', array('id'=> $attachment->id));
    }


    public static $Validation = array(

        'name'  => 'required|min:3',

        'type'  => 'required',

        'contact_person'  => 'required',

        'phone'  => 'required',

        'fax'  => 'required',

        'email'  => 'required',

        'contact_person' => 'required',

    );



    public static function validate($id, $data){



        $validation = static::$Validation;



        return Validator::make($data, $validation);

    }



    public function toArr($val, $key = 'tmp'){

        if(isset($this->tmp[$key])) return $this->tmp[$key];



        $this->tmp[$key] = json_decode($val, true);

        return $this->tmp[$key];

    }



    public function setTypeAttribute($val){

        if(isset($this->tmp['type'])) unset($this->tmp['type']); 

        $this->attributes['type'] = json_encode($val);

    }



    public function getTypeAttribute($val){

        return $this->toArr($val, 'type');

    }



    public static function getSuppliers($type = null){



        if($type == 'tme'){

            $suppliers = Supplier::where('type', 'LIKE', '%'.'Supply tools | materials | equipment'.'%')->get();

        }elseif($type == 'supply_and_install'){

            $suppliers = Supplier::where('type', 'LIKE', '%'.'Supply and install'.'%')->get();

        }elseif($type == 'equipment_rental'){

            $suppliers = Supplier::where('type', 'LIKE', '%'.'Equipment rental'.'%')->get();

        }elseif($type == 'supplier_bill_type'){

            $suppliers = Supplier::where('type', 'LIKE', '%'.'Supplier bill type'.'%')->get();
            
        }else{

            $suppliers = Supplier::all();

        }



        return getSelect($suppliers);

    }

}