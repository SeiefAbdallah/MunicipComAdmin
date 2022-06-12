<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeAutorisation extends Model
{
    use HasFactory;
    protected $table = "type_autorisations";
    protected $fillable = ['Nom', 'Type'];
}
