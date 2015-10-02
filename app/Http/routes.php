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

Route::get('/', function () {
    return view('welcome');
});


Route::post('sessione',['as'=>'sessione','uses'=>'SessionController@store']);
//Route::resource('/session','SessionController');


//======AUNTHENTICATE=====

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as'=>'auth.login', 'uses'=>'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as'=>'auth.logout','uses'=>'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', ['as'=>'auth.register', 'uses'=>'Auth\AuthController@postRegister']);

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', ['as'=>'password.reset','uses'=>'Auth\PasswordController@postReset']);

//=====ADMIN=====

Route::group(['prefix' => 'admin', 'middleware'=>'auth'], function () {

    Route::get('/',['as'=>'admin.home', function(){
        return view('admin.index');
    }]);

    Route::get('/education/create_item/{id}',['as'=>'admin.education.create_item','uses'=>'Backend\EducationController@create_item']);
    Route::get('/education/updateOrder/{id}',['as'=>'admin.education.updateOrder', 'uses'=>'Backend\EducationController@updateOrder']);
    Route::resource('/education','Backend\EducationController');

    Route::resource('/educationcategory','Backend\EducationCategoryController');

    Route::resource('/intro','Backend\IntroController');

    Route::get('/question/updateOrder', ['as'=>'admin.question.updateOrder', 'uses'=>'Backend\QuestionController@updateOrder']);
    Route::post('/question/deleteimg/{id}', ['as'=>'admin.question.deleteimg', 'uses'=>'Backend\QuestionController@deleteImg']);
    Route::resource('/question','Backend\QuestionController');



    Route::get('/questionoption/createOpcionQuestion/{id}', ['as'=>'admin.questionoption.createOpcionQuestion', 'uses'=>'Backend\QuestionOptionController@createOpcionQuestion']);
    Route::get('/questionoption/updateOrder', ['as'=>'admin.questionoption.updateOrder', 'uses'=>'Backend\QuestionOptionController@updateOrder']);
    Route::get('/questionoption/loadselect/{id}', ['as'=>'admin.questionoption.loadselect', 'uses'=>'Backend\QuestionOptionController@loadselect']);
    Route::resource('/questionoption','Backend\QuestionOptionController');

    Route::get('/result/showByQuestion/{id}',['as'=>'admin.result.showByQuestion', 'uses'=>'Backend\ResultController@showByQuestion']);
    Route::get('/result/createByQuestion/{id}',['as'=>'admin.result.createByQuestion','uses'=>'Backend\ResultController@createByQuestion']);
    Route::resource('/result','Backend\ResultController');

    Route::resource('/resultlevel','Backend\ResultLevelController');
//RESULT LEVEL CONDITIONS
    Route::get('/resultlevelcondition/level/{id}',['as'=>'admin.resultlevelcondition.level', 'uses'=>'Backend\ResultLevelConditionController@showByLevel']);
    Route::get('/resultlevelcondition/createbylevel/{id}',['as'=>'admin.resultlevelcondition.createbylevel', 'uses'=>'Backend\ResultLevelConditionController@createByLevel']);
    Route::resource('/resultlevelcondition','Backend\ResultLevelConditionController');

    Route::resource('/resulttype','Backend\ResultTypeController');

    Route::get('/sent/listByType/{id}',['as'=>'admin.sent.listByType', 'uses'=>'Backend\sentController@listByType']);
    Route::resource('/sent','Backend\SentController');

    Route::resource('/brand','Backend\BrandController');

    Route::resource('/metric','Backend\MetricController');

    Route::resource('/metricanswer','Backend\MetricAnswerController');

    Route::resource('/share','Backend\ShareController');



});

//=====ROUTES WEB=====
//Route::get('/home',function(){return view('home');});
Route::get('/resultlevelcondition/findlevel',['as'=>'resultlevelcondition.findlevel', 'uses'=>'Frontend\ResultLevelConditionController@findlevel']);



Route::get('/',['uses'=>'Frontend\HomeController@index']);
Route::get('/assessment',['as'=>'web.assessment','uses'=>'Frontend\HomeController@assessment']);

Route::get('/question/slug/{slug}',['as'=>'web.question.showSlug','uses'=>'Frontend\QuestionController@showSlug']);
Route::get('/question/questionloadajax',['as'=>'web.question.questionloadajax','uses'=>'Frontend\QuestionController@questionloadajax']);
Route::get('/question/questions',['as'=>'web.question.questions','uses'=>'Frontend\QuestionController@questions']);
Route::get('/question/questions2',['as'=>'web.question.questions2','uses'=>'Frontend\QuestionController@questions2']);

Route::resource('/question','Frontend\QuestionController');

Route::get('/education','Frontend\EducationController@index');


Route::get('/pledge/count','Backend\PledgeController@count');
Route::get('/pledge/countByCategory',['as'=>'pledge/countByCategory','uses'=>'Backend\PledgeController@countByCategory']);
Route::resource('/pledge','Backend\PledgeController');

Route::get('/answers/results',['as'=>'answers.results','uses'=>'Frontend\AnswerController@result']);
Route::get('/answers/results_final/{id}',['as'=>'answers.results','uses'=>'Frontend\AnswerController@result_final']);

Route::resource('/answer','Frontend\AnswerController');

Route::resource('/resultlevel','Frontend\ResultLevelController');

Route::get('/pdf/report/{quizz}/{level}', ['as'=>'pdf.report','uses'=>'Frontend\PdfController@report']);

Route::get('/sendmail/mail','Frontend\Sendmail@send');

/*Route::get('/result_final',function(){
    return view('web/results_final');
});
Route::get('/result_final2',function(){
    return view('web/results_final2');
});*/

//========metrica=============

Route::get('/metric/load',['as'=>'metric.load','uses'=>'Frontend\MetricController@load']);
Route::resource('/metric','Frontend\MetricController');

Route::get('/metricanswer/load','Frontend\MetricAnswerController@load');



//Route::resorce('/sendmail','Frontend\Sendmail');



