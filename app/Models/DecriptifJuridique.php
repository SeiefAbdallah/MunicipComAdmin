<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DecriptifJuridique extends Model
{
    use HasFactory;
    protected $table = "decriptif_juridiques";
    protected $fillable = ['Nom', 'Body'];
}
