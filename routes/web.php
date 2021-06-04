<?php

use App\Models\User;
use App\Models\Invite;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InviteController;

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

Route::resource('events', EventController::class)->middleware(['auth']);

Route::get('events/{event}/invite', [InviteController::class, 'show'])->middleware('auth')->name('invite.show');

Route::get('/me/invites', function () {
    $user = User::find(auth()->id());
    $invites = $user->openInvites();
    return view('me.invites', compact('invites'));
})
    ->middleware('auth')
    ->name('my.invites');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
