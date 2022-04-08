<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CasePivot extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
    ];

    public function cases(){
        return $this->hasMany(CaseModel::class,'case_id','id');
    }
    
    public function sympthons(){
        return $this->hasMany(Solution::class,'casepivot_id','id');
    }
}
