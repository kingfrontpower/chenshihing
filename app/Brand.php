<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends BaseModel
{
    protected $fillable = array('name', 'created_at_ip', 'updated_at_ip');

}
