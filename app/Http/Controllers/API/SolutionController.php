<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Solution;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    public function add(Request $request){
        $request->validate([
            'name'=>['required','string','max:255'],
        ]);

       $disease =  Solution::create([
            'solution_name'=>$request->name,
        ]);
        return ResponseFormatter::success(
            $disease,
            "Success post disease"
        );
    }

    public function all(Request $request){
        $id = $request->input('id');

        if($id){
            $solution = Solution::all()->find($id);
            if($solution){
                return ResponseFormatter::success($solution,"Success get disease");
            }else{
                return ResponseFormatter::error(null,"id not found");
            }
        }

        $solution = Solution::all();

        return ResponseFormatter::success($solution,"success get diseases");

    }
}
