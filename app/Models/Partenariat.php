<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partenariat extends Model
{
    use HasFactory;
    protected $table = "Partenariats";
    protected $fillable = ['Nom', 'Logo', 'Type'];
}
