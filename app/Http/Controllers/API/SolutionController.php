<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Solution;
use App\Models\SolutionPivot;
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

    public function addSolutionPivot(Request $request){
        $request->validate([
            'case_id'=>['required'],
            'solution_id'=>['required'],
        ]);

       $solution =  SolutionPivot::create([
            'case_id'=>$request->case_id,
            'solution_id'=>$request->solution_id,
        ]);
        return ResponseFormatter::success(
            $solution,
            "Success post solution"
        );
    }

    public function allSolutionPivot(Request $request){
        $id = $request->input('id');

        if($id){
            $solution = Solution::where('id',$request->id)->with(['solutionPivots.cases.disease'])->first();
            if($solution){
                return ResponseFormatter::success($solution,"Success get disease");
            }else{
                return ResponseFormatter::error(null,"id not found");
            }
        }

         $solution = Solution::with(['solutionPivots.cases.disease'])->get();

        return ResponseFormatter::success($solution,"success get Solution Pivots");

    }
}
