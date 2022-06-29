<?php

use App\Http\Controllers\CaculatorController;
use App\Http\Controllers\Giai;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ManufactureController;
use App\Models\Manufactures;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('Caculator', function () {
    return view('Caculator');
});
Route::get('/', function () {
    $cars = Manufactures::find(1)->cars();
    dd($cars);
    return view('news');
});
// Route::post('PTBN',function(Request $req){
//     $a = $req-> input('a');
//     $b = $req-> input('b');
//     if($a==0)
//        if ($b==0)
//            $kq ="phuong trinh vo nghiem xuat hien";
//        else $kq ="pt vô nghiệm";
//      else $kq = "phuong trinh co nghiem x =".round(-$b/$a,2);
//      return view('PTBN',compact('kq','a','b'));
//    //   return view('ptb1',compact('kq')) ;
   
//    })-> name('PTBN.post');
// Route::resource('cars',CarController::class);
Route::get('manufacture/{id}',[ManufactureController::class,'showCar'])->name('cars.manufacture');
Route::get('cars',[CarController::class,'index'])->name('cars.index');
Route::get('cars/create',[CarController::class,'create'])->name('cars.create');
Route::post('cars',[CarController::class,'store'])->name('cars.store');
Route::get('cars/{car}',[CarController::class,'show'])->name('cars.show');
Route::get('cars/{car}/edit',[CarController::class,'edit'])->name('cars.edit');
Route::put('cars/{car}',[CarController::class,'update'])->name('cars.update');
Route::delete('cars/{car}/delete',[CarController::class,'destroy'])->name('cars.destroy');
// Route::get('/cars/delete/{car}', [CarController::class, 'delete']);
Route::post('PTBN',[Giai::class,'giaiPTBN'])->name('PTBN');
Route::post('Caculator',[CaculatorController::class,'radio'])-> name('radio');