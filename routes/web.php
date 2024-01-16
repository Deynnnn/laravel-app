<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Profile\AvatarController;
// use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
    // $users = DB::select("select * from users");
    // $users = User::find(1);


    // inserting - raw query
    // $insert = DB::insert("insert into users (name, email, password) values (?,?,?)", [
    //     'Deyn Pascua',
    //     'deyn123@deyndev.com',
    //     'deyn1234'
    // ]);

    // using using  query builder
    // $insert = DB::table('users')->insert([
    //     'name' => 'Rooster',
    //     'email' => 'teruboy@deyndev.com',
    //     'password' => 'roosteru123'
    // ]);

    // using eloquent orm
    // $insert = User::create([
    //     'name' => 'Rooster',
    //     'email' => 'teruboy@deyndev.com',
    //     'password' => 'roosteru123'
    // ]);
    // =========================================

    // if($insert == true){
    //     dd($insert, 'successfully inserted the user!');
    // }else{
    //     dd("no user inserted!");
    // }
    // updating - raw query
    // $update = DB::update("update users set name = 'RhoelDeyn Pascua' where id = 2");

    // using using  query builder
    // $update = DB::table('users')->where('id', 5)->update([
    //     'name' => 'Teru Boy'
    // ]);

    // using eloquent orm
    // $update = User::find(6);
    // $update->update([
    //     'email' => 'rooster1@deyndev.com'
    // ]);
    // =========================================

    // deleting - raw query
    // $del = DB::delete("delete from users where id = 3");

    // using  query builder
    // $del = DB::table('users')->where('id', 5)->delete();

    // using eloquent orm
    // $del = User::delete();
    // reset and clear table data
    // $delAll = User::truncate();

    // dd($users->name);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
