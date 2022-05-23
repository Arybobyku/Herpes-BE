<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolutionPivot extends Model
{
    use HasFactory;
    protected $fillable = [
        'solution_id',
        'case_id',
    ];

    public function cases(){
        return $this->hasMany(CaseHerpes::class,'id','case_id');
    }
    public function solution(){
        return $this->hasOne(Solution::class,'id','solution_id');
    }
}
