<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
/*
 * Route - фасад, который возвращает объект класса Router*/
/* web.php was changed to test git */
Route::get('/', function () {   // Контроллер отсутсвует - значит данные сразу передаются во
    return view('welcome');// View
});

Route::get('/my_first_page', function () { // get - метод (может быть post)
    return view('my_first_page');
});

Route::get('/href_mod', function () { //параметры - массив, ф-я или контроллер

    //echo 'href_mod';
    //return; // alternative
    return view('href_mod');
});

//Route::any('/form_post_reciever', function () {
Route::match(['get', 'post'],'/form_post_reciever', function () {
    print_r($_POST);
    print_r($_GET);
});

Route::get('/form_post_sender', function () {
    return view('form_post_sender');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/**************************** Routes with params *************************/
//Route::get('/modname/{id}/{cat?}', function ($id, $cat = null) {//params order by template
Route::get('/modname/id/{id}/cat/{cat?}', function ($id, $cat = 1) { // ? - не обязательный параметр
                                                // $id, $cat по порядку
//Route::get('/modname/id/{id}/{cat?}', function ($id, $cat = null) {
    echo $id.' - '.$cat;
})->where(['id' =>'[0-9]+', 'cat' => '[A-Za-z]+']);  // where - regexp (array) filter
                                                // $id, $cat по имени
/*********************** Groups *******************/
// Route::group(['prefix' => 'adm/{id}'], function () {
Route::group(['prefix' => 'adm'], function () { // prefix - префикс группы
    Route::get('/user/create', function () {
        echo 'xcvxcvxcvxcv';
        redirect()->route('postedit');
    });
    Route::get('/post/edit', ['as' => 'postedit', function () { // as - имя текущего роутера
        echo route('postedit'); // имя роутера - 1-й параметр методов route() и
    }]);                              // redirect()->route
});
/*********** Routes names ***********/
Route::get('/user/create/id/{id}', function ($id) {
    return redirect()->route('postedit', array('id' => $id));
});
Route::get('/post/edit/{id}', ['as' => 'postedit', function ($id) {
    echo route('postedit', array('id' => $id));
}]);