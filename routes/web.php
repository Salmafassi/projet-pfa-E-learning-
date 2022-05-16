<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormationController;
use App\Models\counter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::put('/UpdateProfileE','App\Http\Controllers\EtudiantController@edit')->name('updateProfile');
Route::put('/UpdateProfileA','App\Http\Controllers\AdminController@edit')->name('updateProfileAdmin');
Route::put('/UpdateProfileP','App\Http\Controllers\ProfController@edit')->name('updateProfileProf');
Route::get('redirects', 'App\Http\Controllers\HomeController@index');
Route::get('/accueil', function () {
    $counters=counter::all();
    if($counters->count()>3){
        foreach($counters as $count){
            $lastcounter=$count;
            $datetime=new DateTime();
            $date=$datetime->format('Y-m-d');
            if($lastcounter->created_at!=$date." 00:00:00"){
                $lastcounter->delete();
            }
            
        }
       
        
    }
    else{
      $counternew=new counter(); 
      $counternew->views=0;
      $datetime=new DateTime();
    $counternew->created_at=$datetime->format('Y-m-d');
      $counternew->save(); 
    }
    
    
    $datenow=new DateTime();
    $datenowC=$datenow->format('Y-m-d');
    $projects=counter::where('created_at',$datenowC)->first();
     $count=(int)$projects->views;
    $projects->views=$count+1;
   $projects->update();

    return view('Accueil',compact('projects'));
})->name("Home");
Route::get('/accueilE', 'App\Http\Controllers\EtudiantController@index');
Route::post('/addfeedback', 'App\Http\Controllers\FeedbackController@store')->name('feecbackadd');
Route::post('/feedbacksite','App\Http\Controllers\FeedbackController@create')->name('feedbacksite');
Route::get('/allproducts/{categorie?}/{author?}', 'App\Http\Controllers\EtudiantController@allproducts')->name('allproduct');
Route::get('/allproducts/author/{author?}', 'App\Http\Controllers\EtudiantController@allproducts');

Route::get('/myproducts/{categorie?}/{author?}/{subscriber?}', 'App\Http\Controllers\EtudiantController@myproducts')->name('myproduct');
Route::get('/myproducts/sub//{author?}/{subscriber?}', 'App\Http\Controllers\EtudiantController@myproducts');
Route::get('/myproducts/categorie/{categorie?}/{subscriber?}', 'App\Http\Controllers\EtudiantController@myproducts');
Route::get('/myproducts/author/{author?}/{subscriber?}', 'App\Http\Controllers\EtudiantController@myproducts');
Route::get('/search/{query?}', 'App\Http\Controllers\EtudiantController@allproductsurch')->name('search');
Route::get('/searchInscrit/{query?}', 'App\Http\Controllers\EtudiantController@myproductsurch')->name('searchInscrit');
Route::get('/contenucours/{id}', 'App\Http\Controllers\EtudiantController@contenucours');
Route::get('/payement/{formation?}','App\Http\Controllers\CheckoutController@checkout');
Route::post('/checkout','App\Http\Controllers\CheckoutController@afterpayment')->name('checkout.credit-card');
Route::get('/coursecontenu/{fichier?}/{formation?}','App\Http\Controllers\EtudiantController@lessoncontenu');
Route::get('/coursecomplet/{lessonNext?}/{lessonCurrent?}/{formation?}/{user?}','App\Http\Controllers\EtudiantController@completlesson');
// Route::get('/allproducts/{categorie?}', 'App\Http\Controllers\EtudiantController@productsParAuthor')->name('allproduct');
Route::get('/profile', function(){
    return view('Etudiant.profileEtudiant');
})->name("profileEtudiant1");
Route::get('/profileAdmin', function(){
    return view('admin.profileAdmin');
})->name("profileAdmin1");
Route::put('/editfeedback','App\Http\Controllers\FeedbackController@update')->name('editfeedback');
Route::get('/feedback/{user?}', 'App\Http\Controllers\FeedbackController@index1');
Route::get('/profs/{user?}','App\Http\Controllers\EtudiantController@affichprofs');
Route::get('/coursepress', function () {
    return view('Etudiant.continueCourse');
})->name('coursepress');
Route::delete("/deletefeedback",'App\Http\Controllers\FeedbackController@delete');
// Route::get('/coursepress/{formation?}','App\Http\Controllers\EtudiantController@coursepress');
Route::get('/watchcourses/{formationid?}','App\Http\Controllers\SubscriberController@watchcourset')->name('watchcourse1');
Route::get('/profileProf', function(){
    return view('prof/profileProf');
})->name("profileProf1");
Route::post('/courseContinue', 'App\Http\Controllers\SubscriberController@add')->name('continuePress');

Route::get('/accueilP', 'App\Http\Controllers\ProfController@index')->name('homeprof');
Route::resource('/addform','App\Http\Controllers\FormationController');
Route::resource('/listcateg','App\Http\Controllers\CategoryController')->only(['index','show']);
Route::resource('/addlesson','App\Http\Controllers\LessonController');
Route::resource('/addSuggest','App\Http\Controllers\SuggestionController');
Route::resource('/listfeeed','App\Http\Controllers\FeedbackController')->only(['index','show','destroy']);
Route::resource('/listSub','App\Http\Controllers\SubscriberController')->only(['index','show','destroy']);
Route::resource('/addchapter','App\Http\Controllers\ChapterController');
Route::get("/email",'App\Http\Controllers\EmailController@create');
Route::post('/email','App\Http\Controllers\EmailController@sendEmail')->name('send.email');
Route::get('/homeprof', function () {
    return view('prof.homeprof');
})->name('homeprof');

Route::resource('/listprof','App\Http\Controllers\ListeprofsController');

Route::get('/bloquerProf/{id?}', 'App\Http\Controllers\ListeprofsController@Bloquer');
Route::get('/débloquerProf/{id?}', 'App\Http\Controllers\ListeprofsController@Débloquer')->name("profsbloquer");
Route::get('/profbloquer', function () {
    return view('admin.listprof.profbloquer');
})->name('profbloquer');
Route::resource('/listform','App\Http\Controllers\listformController');
Route::resource('/listetud','App\Http\Controllers\ListetudController');
Route::get('/bloquerEtud/{id?}', 'App\Http\Controllers\ListetudController@Bloquer');
Route::get('/débloquerEtud/{id?}', 'App\Http\Controllers\ListeetudController@Débloquer');
Route::get('/studsbloquer', function () {
    return view('admin.listetud.studsbloquer');
})->name('studsbloquer');
Route::resource('/listsugg','App\Http\Controllers\listsuggController');
Route::resource('/listfeed','App\Http\Controllers\ListfeedController');
Route::get('/formvendu', function () {
    return view('listformvendu');
})->name('formvendu');

Route::get('/formvenduA', function () {
    return view('admin.listform.listformvendu');
})->name('formvenduA');
Route::get('/homeadmin', function () {
    return view('admin.homeadmin');
})->name('homeadmin');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
