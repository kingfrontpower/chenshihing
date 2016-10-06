
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', "myController@index");

Route::get('/contact_us', "myController@contact_us");

Route::get('/login', "myController@login");

Route::get('/logout', "myController@logout");

Route::get('/products', "myController@products");

Route::get('/products/category', "myController@products_category");

Route::get('/products/brands', "myController@products_brands");

Route::get('/products/details/{id}', "myController@products_details");

Route::get('/blog', "myController@blog");

Route::get('/blog/post/{i}', "myController@blog_post");

Route::get('/search/{key_word}', "myController@search");

Route::get('/cart', "myController@cart");

Route::post('/cart', "myController@cart");

//Route::get('/checkout', "myController@checkout");

//在路由使用中間層檢查是否已經登入
//加入middleware驗證路由，有登入才能進入指定的controller方法，沒登入則導向至login頁面
Route::get('/checkout', ["middleware" => "auth", "uses" => "myController@checkout"]);

Route::post('/cart/add', "myController@cart_add");

Route::get('/clear_cart' , "myController@clear_cart");

Route::post('/register' , "myController@register");

Route::get('/fb_redirect' , "myController@fb_redirect");

Route::get('/fb_callback' , "myController@fb_callback");

Route::post('/auth/login' , "myController@auth_login");

Route::get('/auth/logout' , "myController@auth_logout");

Route::get('/test/write', function (){
    $product = new \App\Product();
//    $product->name = '345test';
//    $product->title = "ehryjt";
//    $product->description = "test";
//    $product->price = 1245;
//    $product->category_id =2;
//    $product->brand_id = 3;
//    $product->created_at_ip = "";
//    $product->updated_at_ip = "";
//    $product->save();

    $product->create(["name"=>'66333test' , "title"=>"fytfjyf" ,"price"=>234]);

    return redirect('/test/read');
});
//ok
Route::get('/test/read' ,function(){
   $product =  new \App\Product();

$product_datas = $product->all(['id' ,'name', 'price']);
    foreach ($product_datas as $product_data)
    {
        echo "$product_data->id , $product_data->name ,$product_data->price <br>";
    }
});
//ok
Route::get('/test/update/{id}' , function ($id){
    $product = \App\Product::find($id);
    $product->price = 346;
    $product->description = "sghoeur";

    $product->save();
    
    return redirect("/test/read");
});
//ok
Route::get('/test/delete/{id}' ,function($id){
    $product = \App\Product::find($id);
    $product->delete();
    return redirect("/test/read");
    
});


//註解掉Auth功能預設的首頁和登入頁，以使用自定義的頁面

//Route::auth();

//Route::get('/home', 'HomeController@index');


//歐付寶相關路由群組
//Route::group用來定義多個路由群組
//其中定義namespace屬性，才可以抓到ScottChayaa底下的controler
//定義prefix屬性定義前綴路由，減少路由文字量
Route::group([
    'namespace' => 'ScottChayaa\Allpay\Controllers',
    'prefix'    => 'allpay_demo_201608'],
    function () {
        //因為prefix有定義'allpay_demo_201608'，所以下列的'/'路由等同allpay_demo_201608，'/checkot'等同'allpay_demo_201608/checkout'
        Route::get('/', 'DemoController@index');
        Route::get('/checkout', 'DemoController@checkout');
    }
);

Route::get('/account', ["middleware" => "auth", "uses" => "myController@account"]);
Route::post('/account', ["middleware" => "auth", "uses" => "myController@account"]);
