<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datapaket extends Model
{
   protected $fillable = ['nama paket'];
    protected $visible = ['nama paket'];
    public  $timestamps = true;
}