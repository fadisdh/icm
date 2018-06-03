<?php 



function getLocale(){

    return Config::get('app.locale');

}



// Format as selectbox

function getSelect($objects){

    $select = array('' => '-- SELECT --');

    foreach ($objects as $object) {

        if(App::getLocale() == 'ar'){

            $select[$object->id] = $object->name_arabic;

        }else{

            $select[$object->id] = $object->name;

        }

    }



    return $select;

}



function getCheckboxes($array, $name, $class, $oldData = null){



    $array = Config::get($array);



    $checkboxes = '';

    if(!is_null($oldData)){

        foreach ($array as $key) {

            $checkboxes .= '<div class="'. $class .'">

                <div class="checkbox">

                    <label>' .

                        Form::checkbox($name,$key, in_array($key, $oldData) ? true : '') . ' ' . $key

                    . '</label>

                </div>

            </div>';

        }

    }else{

        foreach ($array as $key) {

            $checkboxes .= '<div class="'. $class .'">

                <div class="checkbox">

                    <label>' .

                        Form::checkbox($name,$key,'') . ' ' . $key

                    . '</label>

                </div>

            </div>';

        }

    }



    return $checkboxes;

}



// Date field

Form::macro('date', function($name, $value = null, $options = array()) {

    $input =  '<input type="text" name="' . $name . '" value="' . $value . '"';



    $class = false;

    foreach ($options as $key => $value) {

        if($key == 'class'){

            $input .= ' ' . $key . '="datepicker ' . $value . '"';

            $class = true;

        }else{

            $input .= ' ' . $key . '="' . $value . '"';

        }

        if(!$class) $input .= ' class="datepicker"';

    }



    $input .= ' />';



    return $input;

});



// Time field

Form::macro('time', function($name, $value = null, $options = array()) {

    $input =  '<input type="time" name="' . $name . '" value="' . $value . '"';



    foreach ($options as $key => $value) {

         $input .= ' ' . $key . '="' . $value . '"';

    }



    $input .= ' />';



    return $input;

});

function upload($file, $destination){
    
    $filename = uniqid() . '.' . strtolower($file->getClientOriginalExtension());
    $uploadSuccess = $file->move($destination, $filename);
    
    if($uploadSuccess) {
        return $filename;
    }

    return false;
}