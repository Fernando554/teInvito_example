<?php

use App\Http\Controllers\pageController;
use App\Http\Livewire\HeaderSection;
use App\Models\invitation;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/content', function () {
    return view('content');
});

Route::get('/footer', function () {
    return view('footer');
});

Route::get('/index', [pageController::class, 'index'])->name('index');

Route::get('/test', function () {
    $id = 1;
    $invitation = invitation::where('id', $id)->with(['invitationComponent'=>function($ivcom) use ($id){
        $ivcom->with(['component'=>function($com) use ($id){
            $com->with(['componentData'=>function($data) use ($id){
                $data->where('invitation_id', $id);
            }]);
        }]);
    }])->first();
    echo json_encode($invitation);
    return view('test', compact('invitation'));
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/header-section', [HeaderSection::class, 'render'])->name('header-section');
