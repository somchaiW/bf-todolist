<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appresponse extends Model
{
    use HasFactory;
    protected $fillable = ['name','surname','username','password'];
}