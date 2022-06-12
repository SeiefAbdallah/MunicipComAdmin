<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MontantImpot extends Model
{
    use HasFactory;

    protected $table = "montant_impots";
    protected $fillable = ['valeur'];
}
