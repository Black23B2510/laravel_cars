<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufactures;
use App\Models\Car;

class ManufactureController extends Controller
{
    //
    public function showCar($id){
            $cars =Manufactures::find($id)->cars()->get();
            return view('showall',['cars'=>$cars]);;
        }
}
