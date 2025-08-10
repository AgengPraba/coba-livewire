<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\About;
use App\Livewire\Home;
use App\Livewire\Contact;
use App\Livewire\Blog;
use App\Livewire\Admin\Dashboard\Index as AdminDashboardIndex;
use App\Livewire\Admin\Blog\Index as AdminBlogIndex;


use App\Livewire\Counter;


Route::get('/', Home::class);
Route::get('/about', About::class)->name('about');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/blogs', Blog::class)->name('blogs');

Route::prefix('admin')->group(function () {
  Route::get('/', AdminDashboardIndex::class)->name('admin.dashboard.index');

  Route::prefix('blogs')->group(function () {
    Route::get('/', AdminBlogIndex::class)->name('admin.blog.index');
    Route::get('/create', \App\Livewire\Admin\Blog\Create::class)->name('admin.blog.create');
    Route::get('/{id}/edit', \App\Livewire\Admin\Blog\Update::class)->name('admin.blog.edit');
    Route::get('/{id}', \App\Livewire\Admin\Blog\Show::class)->name('admin.blog.show');
  });

  Route::prefix('categories')->group(function () {
    Route::get('/', \App\Livewire\Admin\Category\Index::class)->name('admin.categories.index');
  });

  Route::prefix('messages')->group(function () {
    Route::get('/', \App\Livewire\Admin\Messages\Index::class)->name('admin.messages.index');
  });

});