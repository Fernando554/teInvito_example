<?php

use App\Http\Controllers\pageController;
use App\Http\Livewire\ContentSection;
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

// Route::get('/content', function () {
//     return view('content');
// });

Route::get('/footer', function () {
    return view('footer');
});

Route::get('/content-section', [ContentSection::class, 'render'])->name('livewire.content-section');

Route::get('/index', [pageController::class, 'index'])->name('index');

<<<<<<< HEAD
Route::get('/test', [pageController::class, 'test'])->name('test');
=======
Route::get('/test', function () {
    $id = 118;

    $invitation = invitation::where('id', $id)->with(['invitationComponent'=>function($ivcom) use ($id){
        $ivcom->with(['component'=>function($com) use ($id){
            $com->with(['componentData'=>function($data) use ($id){
                $data->where('invitation_id', $id);
            }]);
        }])->orderBy('order', 'asc');//  orderBy invitation order
    }])->first();
//echo json_encode($invitation->invitationComponent[1]->component->componentDataOrder());
    return view('test', ['invitation'=>$invitation]);
});
>>>>>>> 48aed88ab1cfe7164814700cdefabf72a6b1368f
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/header-section', [HeaderSection::class, 'render'])->name('header-section');
