<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelsDesign extends Model
{
    use HasFactory;
    protected $table = "models_designs";
    protected $fillable = ['entete', 'footer'];
}
