<?php 

use App\Models\User;


if(!function_exists('doctor')){
    function doctor () {
        return  User::where('category', 'doctor')->get();
    }
}


?>
