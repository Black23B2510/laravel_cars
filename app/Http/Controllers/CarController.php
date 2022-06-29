<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Manufactures;
use Illuminate\Support\Facades\File;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //trả về danh sách toàn bộ data trong db
    //Route::get('cars',[CarController::Class,'index'])
    // public function showCar(){
    //     return Manufactures::find(1);
    // }
    public function index()
    {
        $cars=Car::all();
        return view('showall',['cars'=>$cars]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Hiển thị form thêm sản phẩm
    //Route::get('cars/create',[CarController::Class,'create']);
    public function create()
    {
        return view('addCars');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Thêm một đối tượng vào db
    //Route::post('cars',[CarController::Class,'store'])
    public function store(Request $req)
    {
        $name = '';
        
        if($req -> hasFile('image')){
            $this->validate($req,[
                'image' =>'mimes:jpg,png,jpeg|max:2048',
            ],[
                'image.mimes'=>'Chỉ chấp nhận files ảnh',
                'image.max' => 'Chỉ chấp nhận files ảnh dưới 2Mb',

            ]);
            $file =$req ->file(('image'));
            $name = time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('images');
            $file -> move($destinationPath, $name);
        }
        $this->validate($req,[
            'description'=>'required', 
            'model'=>'required',
            'produced_on'=>'required',
            'manufacture_id'=>'required'
        ],[
            'description.required' =>'Bạn chưa nhập mô tả',
            'model.required' =>'Bạn chưa nhập model',
            'produced_on.required' =>'Bạn chưa nhập ngày sản xuất',
            'produced_on.date' =>'Cột produced_on phải là kiểu ngày!',
            'manufacture_id'=>'Bạn chưa nhập tên nhà sản xuất'
        ]);
        $car=new Car();
        $car->description=$req->description;
        $car->model=$req->model;
        $car->produced_on=$req->produced_on;
        $car->image=$name;
        $car->manufacture_id=$req->manufacture_id;
        $car->save();
        return redirect()->route('cars.index')->with('success', 'Bạn đã cập nhật thành công');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $car = Car::find($id);
        return view('show',['car'=>$car]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);
        return view('carEdit',['car'=>$car]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $name = '';
        
        if($req -> hasFile('image')){
            $this->validate($req,[
                'image' =>'mimes:jpg,png,jpeg|max:2048',
            ],[
                'image.mimes'=>'Chỉ chấp nhận files ảnh',
                'image.max' => 'Chỉ chấp nhận files ảnh dưới 2Mb',

            ]);
            $file =$req ->file(('image'));
            $name = time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('images');
            $file -> move($destinationPath, $name);
        }
        $this->validate($req,[
            'description'=>'required', 
            'model'=>'required',
            'produced_on'=>'required',
            'manufacture_id'=>'required'
        ],[
            'description.required' =>'Bạn chưa nhập mô tả',
            'model.required' =>'Bạn chưa nhập model',
            'produced_on.required' =>'Bạn chưa nhập ngày sản xuất',
            'produced_on.date' =>'Cột produced_on phải là kiểu ngày!',
            'manufacture_id'=>'Bạn chưa nhập tên nhà sản xuất'
        ]);
        $car=Car::find($id);
        $car->description=$req->description;
        $car->model=$req->model;
        $car->produced_on=$req->produced_on;
        $car->manufacture_id=$req->manufacture_id;
        if($name==''){
            $name = $car->image;
        }
        $car->image = $name;
        $car->save();
        Session::flash('success','Ban da cap nhat thanh cong mot sp');
        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car= Car::find($id);

        $imgLink = public_path('images/').$car->image;
            
        if(File::exists($imgLink)) {
            File::delete($imgLink);
        }
         $car->delete();
         Session::flash('success','Bạn đã xóa thành công');
        return redirect()->route('cars.index');
    }
}


