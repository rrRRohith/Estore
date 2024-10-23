<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulePlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_id',
        'module_id',
    ];
    

}
