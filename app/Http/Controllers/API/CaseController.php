<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\CaseHerpes;
use App\Models\CaseModel;
use Illuminate\Http\Request;

class CaseController extends Controller
{
    public function add(Request $request){
        $request->validate([
            //exists:nama tabel database
            'disease_id'=>'exists:diseases,id',
            'confidence_level' => 'required',
            'age' => 'required',
            'gender' => 'required',
        ]);

       $case =  CaseHerpes::create([
            'disease_id'=>$request->disease_id,
            'confidence_level'=>$request->confidence_level,
            'age'=>$request->age,
            'gender'=>$request->gender,
        ]);
        return ResponseFormatter::success(
            $case,
            "Success post disease"
        );
    }

    public function all(Request $request){
        $id = $request->input('id');

        if($id){
            $case = CaseHerpes::with(['disease'])->find($id);
            if($case){
                return ResponseFormatter::success($case,"Success get disease");
            }else{
                return ResponseFormatter::error(null,"id not found");
            }
        }

        $case = CaseHerpes::with(['disease'])->get();

        return ResponseFormatter::success($case,"success get diseases");

    }
}
