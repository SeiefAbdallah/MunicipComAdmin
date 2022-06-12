<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tentative extends Model
{
    use HasFactory;
    protected $table = "tentatives";
    protected $fillable = ['code', 'confirmation'];
}
