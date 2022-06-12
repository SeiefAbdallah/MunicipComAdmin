<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembreExterieure extends Model
{
    use HasFactory;
    protected $table = "Membre-exterieures";
    protected $fillable = ['Nom', 'Cin'];
}
