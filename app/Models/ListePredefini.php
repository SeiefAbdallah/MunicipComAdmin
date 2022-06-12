<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListePredefini extends Model
{
    use HasFactory;
    protected $table = "liste_predefinis";
    protected $fillable = ['cin', 'nom'];
}
