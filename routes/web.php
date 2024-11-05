<?php
use App\Models\User;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use App\Facades\CustomFacade;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [TestController::class,'index']);
//Middleware applied to only print method of TestController
// Route::get('/test', [TestController::class,'print']);

Route::get('/check',function(){
    return CustomFacade::SomeMethod();
});

Route::get('/blog',[BlogController::class,'index'])->middleware('authRouteCheck');

Route::get('/slug',function(){
    $title = 'AI - Exploring future of IT';
    $slug = slug($title);
    return $slug;
});

//Route Group - Middleware group
Route::group(['middleware' => 'authRouteCheck'],function(){
    //Routes that needs to be protected by this middleware
    Route::get('/dashboard',function(){
        return view('dashboard');
    });
    
    Route::get('/profile',function(){
        return view('profile');
    });
});


//Route Model Binding 
//To access user data from DB depending on user id
//laravel is assuming that the route parameter value is the primary id and it retrieves the user instance corresponding to that id and saves it in $user
Route::get('/user/{user}',function(User $user){
    return $user;
});

//If using custom column to retrieve user we need to use /user/{user:email} - so laravel will retrieve user instance matching this email id

Route::get('/unavailable',function(){
    return view('unavailabale');
})->name('unavailable');

//Global middleware is applied to all the routes - all HTTP requests has to be filtered through global middleware

//HTTP Session
Route::get('get-session',function(Request $request){
    //session global function - retrieve all sessions
    // $data = session()->all();
    // Accessing session data through request instance
    $data = $request->session()->all();
    dd($data);
    //To grab just only one data from session - print values when accessed via its key 
    /* $token = $request->session()->get('_token');
    dd($token); */
});

//Store data in Http session
Route::get('set-session',function(Request $request){
    // $request->session()->put('user_id','321');
    // $request->session()->put(['user_status' => 'logged_in']);
    // we can also use global function to store data in session
    session(['user_ip'=>'121.32.4.12']);
    // session()->put('user_name','admin');
    //redirect to URL
    return redirect('get-session');
});

//Delete data from Http session
Route::get('destroy-session',function(Request $request){
    //the key value pair will be deleted from the session corresponding to the specified key
    // $request->session()->forget('user_name');
    //To delete multiple keys
    // $request->session()->forget(['user_status','user_ip']);
    // we pass a string or an array to delete the needed keys from session
    // session()->forget('user_id');
    // To delete all data from the session
    session()->flush();
    // $request->session()->flush();
    return redirect('get-session');
});

//Flash Sessions - stores data for a short time and destroys it automatically 
Route::get('flash-session',function(Request $request){
    //We go to any other page and try hitting get-session the flash session will be destroyed - stores content for single request if user navigates to other pages the data stored is destroyed automatically
    $request->session()->flash('status','true');
    return redirect('get-session');
});

Route::get('send-mail',function(){
    //adds job to the database table and then we need to process our job
    // SendMail::dispatch();

});