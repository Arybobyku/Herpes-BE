<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'solution_name',
    ];

    public function solutionPivots(){
        return $this->hasMany(SolutionPivot::class,'solution_id','id');
    }
}
