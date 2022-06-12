<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeancesPliniere extends Model
{
    use HasFactory;
    protected $table = "seances_plinieres";
    protected $fillable = ['heure','Datedebut   ', 'Sujet','nom'];
}
