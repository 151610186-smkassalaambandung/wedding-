<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class galeri extends Model
{
    
    protected $fillable = ['nama','cover'];
    protected $visible = ['nama','cover'];
    public  $timestamps = true;
}
