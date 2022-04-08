<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolutionPivot extends Model
{
    use HasFactory;
    protected $fillable = [
        'casepivot_id',
        'solution_id',
    ];

    public function sympthons(){
        return $this->belongsToMany(CasePivot::class,'casepivot_id','id');
    }
    public function solutions(){
        return $this->belongsToMany(Solution::class,'solution_id','id');
    }
}
