<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'people';
    protected $fillable = ['firstname', 'lastname', 'email', 'phone', 'city'];
    protected $primaryKey = 'id';
}