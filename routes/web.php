<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// =============== - BACKEND - =================
Route::group(array("prefix"=>"admin","middleware"=>"auth"),function(){
	Route::get("/",function(){
		return redirect(url("admin/du-an"));
	});
	Route::get("/logout",function(){
		Auth::logout();
		return redirect(url("admin"));
	});
	Route::get("/your-profile",'backend\userController@profile');
	Route::get("/edit-profile/{id}",'backend\userController@view_edit');
	Route::post("/edit-profile/{id}",'backend\userController@edit');
	Route::get("user",'backend\userController@view_user');
	Route::get("/new-account",'backend\userController@view_add');
	Route::post("/new-account",'backend\userController@add');
	Route::get("/inbox",'backend\responseController@view_inbox');
	Route::get("inbox/delete-inbox/{id}",'backend\responseController@delete');
	Route::post("/inbox/send-mail",'backend\responseController@send_mail');

	Route::get("du-an",'backend\duanController@view_du_an');
	Route::post("du-an",'backend\duanController@edit_du_an');

	// news
	Route::get("news",'backend\newsController@view_news');
	Route::post("news",'backend\newsController@add_edit_news');
	Route::get("news/delete/{id}",'backend\newsController@delete_news');

	// Images
	Route::get("images/slider",'backend\imgController@view_slider');
	Route::post("images/slider",'backend\imgController@add_slider');
	Route::get("images/slider/delete/{id}",'backend\imgController@delete_slider');
	// service
	Route::get('service','backend\serviceController@view_service');
	Route::post('service','backend\serviceController@add_service');
	Route::get('service/delete/{id}','backend\serviceController@delete_service');
	// apartment property
	Route::get('property','backend\propertyController@view_property');
	Route::post('property','backend\propertyController@add_edit_property');
	Route::get('property/delete/{id}','backend\propertyController@delete_property');

	// Upload images
	Route::get("upload-images",'backend\imgController@view_upload');
	Route::post("upload-images",'backend\imgController@add_upload');
	Route::get('delete-images/{name}','backend\ajaxController@delete_img');
	//Meta
	Route::get("/seo",'backend\seoController@view_seo'); 
	Route::post("/seo",'backend\seoController@add_edit_meta'); 
	Route::get("/seo/{title}",'backend\seoController@edit_title'); 
	
});
// =============== - BACKEND - =================

// =============== - FRONTEND - =================
	Route::group(['middleware'=>['web']],function(){
		Route::get("/","frontend\homeController@view_home");
		Route::post("/","frontend\contactController@contact_2");

		Route::get("/contact/{name}/{email}/{phone}","frontend\ajaxController@contact");

		Route::get("/ajax/property_profile/{id}",'frontend\ajaxController@view_property');
		Route::get('lien-he','frontend\homeController@view_contact');
		Route::post('lien-he','frontend\contactController@contact_1');

		Route::get('/tin-tuc/{name}','frontend\homeController@view_news');
		Route::post('/tin-tuc/{name}','frontend\contactController@contact');
	});
// =============== - FRONTEND - =================
