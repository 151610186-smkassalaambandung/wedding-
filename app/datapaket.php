<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datapaket extends Model
{
   protected $fillable = ['namapaket','cover'];
    protected $visible = ['namapaket','cover'];
    public  $timestamps = true;
}