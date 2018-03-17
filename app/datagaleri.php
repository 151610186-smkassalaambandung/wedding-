<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datagaleri extends Model
{
    
    protected $fillable = ['nama','cover'];
    protected $visible = ['nama','cover'];
    public  $timestamps = true;
}
