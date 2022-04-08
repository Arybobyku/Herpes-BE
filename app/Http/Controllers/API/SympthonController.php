<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Sympthon;
use Illuminate\Http\Request;

class SympthonController extends Controller
{
    public function add(Request $request){
        $request->validate([
            'name'=>['required','string','max:255'],
        ]);

       $sympthon =  Sympthon::create([
            'sympthon_name'=>$request->name,
        ]);
        return ResponseFormatter::success(
            $sympthon,
            "Success post disease"
        );
    }

    public function all(Request $request){
        $id = $request->input('id');

        if($id){
            $sympthon = Sympthon::all()->find($id);
            if($sympthon){
                return ResponseFormatter::success($sympthon,"Success get disease");
            }else{
                return ResponseFormatter::error(null,"id not found");
            }
        }

        $sympthon = Sympthon::all();

        return ResponseFormatter::success($sympthon,"success get diseases");

    }
}
