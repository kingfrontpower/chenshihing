<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2016/9/22
 * Time: 上午 02:31
 */

namespace App;
use Laravel\Socialite\Contracts\User as VendorUser;



class SocialiteUserService
{
public function checkUser(VendorUser $vendor_user)
{
    //使用ORM查詢從FB回傳的使用用者資料是否存在於socialite_users資料表，先查詢裡面vender是fb的，再進一步用回傳的使用者id查詢，vender是vendor的typo
    //"whereVender"這種查詢語法規則是where<欄位名稱開頭大寫>，然後可用->做二次查詢，查詢語法不只一種，可觀看document瞭解

    $account = SocialiteUser::whereVendor("facebook")->whereVendorUserId($vendor_user->getId())->first();

    if($account)
    {
        //如果有查到，代表之前已使用fb登錄過，直接傳回user，這裡的user不是欄位名稱而是指$account這筆socialite_user資料表的資料所關聯到users資料表的那一筆資料
        //關聯的部份在首次登入時會建立，在下方
        return $account->user;
    }
    //如果沒有使用FB登錄過
    else
    {
        //使用ORM新增一筆socialite_users資料，寫入值為fb傳回的數據
        $account = new SocialiteUser([
            "vender" => "facebook",
            "vender_user_id" => $vendor_user->getId(),
        ]);
        //比對user資料表中是否有email相同的使用者
        $user = User::whereEmail($vendor_user->getEmail())->first();
        //如果沒有，則在user資料表新建一筆使用者資料
        if(!$user)
        {
            $user = User::create([
                "email" => $vendor_user->getEmail(),
                "name" => $vendor_user->getName(),
            ]);
        }
        //$account->user()建立socialite_users資料表與users資料表的關聯(socialite_users資料表belongs to users資料表)
        //->associate($user)指定關聯欄位，傳入$user這筆資料，預設會去尋找這筆資料的索引key，也就是id
        //然後預設對應到socialite_users資料表的user_id欄位，這是預設的，但可以修改指定欄位
        $account->user()->associate($user);
        $account->save();

        return $user;
    }

}


}