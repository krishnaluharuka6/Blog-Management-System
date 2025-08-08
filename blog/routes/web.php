<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/',[HomeController::class,'home'])->name('index');
Route::get('blog_page',[HomeController::class,'blog'])->name('blog_page');
Route::get('category/{category:slug}',[HomeController::class,'category'])->name('cat_blog');
Route::get('about_page',[HomeController::class,'about'])->name('about_page');
Route::get('singlepost/{slug}',[HomeController::class,'singlepost'])->name('singlepost');
Route::get('contact_page',[HomeController::class,'contact'])->name('contact_page');
Route::get('blogs_search',[HomeController::class,'search'])->name('search');

Route::resource('contact', ContactController::class);

Route::middleware('auth','role:user')->group(function(){
    Route::get('user_dashboard',[UserController::class,'index'])->name('user_dashboard');

    Route::get('user_dashboard_edit', [UserController::class, 'edit'])->name('user.edit');
    
    Route::patch('user_dashboard_update', [UserController::class, 'update'])->name('user.update');
    Route::delete('user_dashboard_destroy', [UserController::class, 'destroy'])->name('user.destroy');

    // Route::post('/images_cleanup', [ImageController::class, 'deleteUnusedImages'])->name('images.cleanup');

});

Route::middleware('auth','role:admin')->group(function(){
    Route::get('/admin_dashboard',[AdminController::class,'index'])->name('admin_dashboard');

    Route::get('/admin_dashboard_edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::patch('/admin_dashboard_update', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin_dashboard_destroy', [AdminController::class, 'destroy'])->name('admin.destroy');

    Route::resource('website',WebsiteController::class);
    Route::get('/edit_website',[WebsiteController::class,'editWebsite'])->name('website.editWebsite');
    Route::put('/update_website',[WebsiteController::class,'updateWebsite'])->name('website.updateWebsite');

    // Route::get('create_categories',[CategoriesController::class,'create'])->name('create_category');
    Route::post('store_category',[CategoriesController::class,'store'])->name('store_category');
    Route::get('/show_categories',[CategoriesController::class,'index'])->name('categories.index');
    Route::get('edit_category/{id}',[CategoriesController::class,'edit'])->name('categories.edit');
    Route::post('update_category/{id}',[CategoriesController::class,'update'])->name('categories.update');
    Route::get('delete_category/{id}',[CategoriesController::class,'destroy'])->name('categories.delete');

    Route::resource('blogs', BlogController::class);
    Route::get('blogs_thrash',[BlogController::class,'trashed'])->name('blogs.trashed');
    Route::patch('blogs/{blog}/restore', [BlogController::class, 'restore'])->name('blogs.restore');
    Route::delete('blogs/{blog}/force_delete', [BlogController::class, 'forceDelete'])->name('blogs.forceDelete');

    Route::resource('images',ImageController::class);
    Route::get('images/{image}/deletefolder',[ImageController::class,'deleteFolder'])->name('images.deleteFolder');

    Route::resource('about',AboutController::class);
    Route::get('/edit_about',[AboutController::class,'editAbout'])->name('about.editAbout');
    Route::put('/update_about',[AboutController::class,'updateAbout'])->name('about.updateAbout');

    Route::get('contact/read/{id}', [ContactController::class, 'markRead'])->name('contact.markRead');


});

Route::middleware(['auth'])->group(function(){
    Route::resource('blogs', 
    BlogController::class);

    Route::get('create_categories',[CategoriesController::class,'create'])->name('create_category');

    Route::post('store_category',[CategoriesController::class,'store'])->name('store_category');

    Route::get('/show_categories',[CategoriesController::class,'index'])->name('categories.index');

    Route::get('edit_category/{id}',[CategoriesController::class,'edit'])->name('categories.edit');

    Route::post('update_category/{id}',[CategoriesController::class,'update'])->name('categories.update');

    Route::get('delete_category/{id}',[CategoriesController::class,'destroy'])->name('categories.delete');

    Route::get('blogs_thrash', 
    [BlogController::class,'trashed'])->name('blogs.trashed');

    Route::patch('blogs/{blog}/restore', [BlogController::class, 'restore'])->name('blogs.restore');

    Route::delete('blogs/{blog}/force_delete', [BlogController::class, 'forceDelete'])->name('blogs.forceDelete');

    Route::resource('images',ImageController::class);

    Route::get('images/{image}/deletefolder',[ImageController::class,'deleteFolder'])->name('images.deleteFolder');

    Route::resource('comment',CommentController::class);
});
