<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Giai extends Controller
{
    public function giaiPTBN(Request $req){
        $req->validate([
            'a' => 'required',
            'b' => 'required',
        ],[
            'a.integer'=>'He so a phai la so  nguyen',
            'b.integer'=>'He so b phai la so  nguyen'
        ]);
        $a = $req-> input('a');
        $b = $req-> input('b');
        if($a==0)
           if ($b==0)
               $kq ="phuong trinh vo so nghiem";
           else $kq ="pt vô nghiệm";
         else $kq = "phuong trinh co nghiem x =".round(-$b/$a,2);
         return view('PTBN',compact('kq','a','b'));
    }
}
