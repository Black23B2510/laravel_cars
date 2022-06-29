<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use Illuminate\Http\Request;

class CaculatorController extends Controller
{
    public function pheptinh(Request $req){
        $req->validate([
            'a' => 'required',
            'b' => 'required',
            'cacul' => 'required',

        ],[
            'a.float'=>'He so a phai la so  nguyen',
            'b.float'=>'He so b phai la so  nguyen'
        ]);
        $a = $req-> input('a');
        $b = $req-> input('b');
        $cacul = $req-> input('tinh');
        if($cacul == 'cong')
            $result = 'Ket qua phep cong '.$a+$b;
        else if ($cacul == 'tru')
            $result = 'Ket qua phep tru '.$a-$b;
        else if ($cacul == 'nhan')
            $result = 'Ket qua phep nhan '.$a*$b;
        else
            $result ='Ket qua phep chia '.round($a/$b,2);
        return view('Caculator',compact('result','a','b', 'cacul'));
    }
    public function radio(Request $req){
        // $validator = Validator::make($req->all(), [
        //     'a' => 'required|numeric',
        //     'b' => 'required|numeric',
        // ],[
        //     'a.required' => 'nhập đi',
        //     'b.required' => 'nhập đi',
        //     'a.numeric' => 'A phải là số ',
        //     'b.numeric' => 'B phải là số ',
        // ]
        // );
        
        // if ($validator->fails()) {
        //     $errors = $validator->errors();
        //     return view('Caculator') ->withErrors($errors);
                        
        // }
        // $req->validate([
        //     'a'=>'required|numeric',
        //     'b'=>'required'
        // ],
        // [
        //     'a.numeric'=>'a la so thuc',
        //     'b.numeric'=>'b la so thuc'
        // ]
        // );
        $a= $req->input('a');
        $b = $req->input('b');
        $check = $req-> input('radio');
        switch ($check) {
            case 'Cong':
                # code...
                $kq = $a+$b;
                break;
            case 'Tru':
                $kq = $a-$b;
                break;
            case 'Nhan':
                $kq = $a*$b;
                break;
            case 'Chia':
                $kq = $b == 0 ? "Division by zero": round($a/$b,2);
                break;
            default:
                # code...
                $kq = 'ERROR';
                break;
        }
        return view('Caculator',compact('kq','a','b','check'));
    }
}
