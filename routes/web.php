<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Welcome;
use App\Livewire\About;
use App\Livewire\Home;
use App\Livewire\Contact;
use App\Livewire\Blog;
use App\Livewire\Posts\Index;


Route::get('/', Welcome::class);
Route::get('/home', Home::class);
Route::get('/about', About::class)->name('about');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/blogs', Blog::class)->name('blogs');

Route::prefix('posts')->group(function () {
  Route::get('/', Index::class)->name('posts.index');
});