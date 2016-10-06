<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialiteUser extends Model
{
    //
    protected $fillable=[
      "vendor",
        "vendor_user_id",
        "user_id"
    ];

    /**
     * @return array
     */
    public function user()
    {
        //建立與users資料表(User ORM對應到的是users資料表)的關聯php 
        return $this->belongsTo(User::class);
    }

}
