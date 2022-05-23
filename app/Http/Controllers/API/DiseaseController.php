<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Disease;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    public function add(Request $request){
        $request->validate([
            'name'=>['required','string','max:255'],
        ]);

    $image = $request->file('image')->store('images');
    $file = $request->file('image') ;
    $destinationPath = public_path().'/images' ;
    $file->move($destinationPath,$image);

       $disease =  Disease::create([
            'disease_name'=>$request->name,
            'image'=>$image
        ]);
        return ResponseFormatter::success(
            $disease,
            "Success post disease"
        );
    }

    public function all(Request $request){
        $id = $request->input('id');

        if($id){
            $disease = Disease::all()->find($id);
            if($disease){
                return ResponseFormatter::success($disease,"Success get disease");
            }else{
                return ResponseFormatter::error(null,"id not found");
            }
        }

        $diseases = Disease::all();

        return ResponseFormatter::success($diseases,"success get diseases");

    }
}
