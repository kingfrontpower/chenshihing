<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Product extends BaseModel
{
    //表示那些欄位可被陣列輸入
    protected $fillable = array('name', 'title', 'description','price','category_id','brand_id','created_at_ip', 'updated_at_ip');


}
