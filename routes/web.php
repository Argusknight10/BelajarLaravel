<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'HOME PAGE']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'ABOUT PAGE', 'name' => 'Arya Bagus']);
});

Route::get('/blogs', function () {
    // // EAGER LOADING
    // $blogs = Blog::with(['author', 'category'])->get();
    // return view('blogs', ['title' => 'BLOG PAGE', 'blogs' => $blogs]);

    // dump(request('search'));
    // // filter() : ambil dari model Blog dengan function() scopeFilter()
    return view('blogs', ['title' => 'BLOG PAGE', 'blogs' => Blog::filter(request(['search', 'category', 'author']))->latest()->paginate(20)->withQueryString()]);
});

Route::get('/blogs/{blog:slug}', function(Blog $blog){
    return view('blog', ['title' => 'DETAIL BLOG', 'blog' => $blog]);
});

Route::get('/authors/{user:username}', function(User $user){
    // // LAZY EAGER LOADING
    // $blogs = $user->blogs->load('category', 'author');
    // return view('blogs', ['title' => count($blogs).' Articles By '.$user->name, 'blogs' => $blogs]);

    return view('blogs', ['title' => count($user->blogs).' Articles By '.$user->name, 'blogs' => $user->blogs]);
});

Route::get('/categories/{category:slug}', function(Category $category){
    // // LAZY EAGER LOADING
    // $blogs = $category->blogs->load('category', 'author');
    // return view('blogs', ['title' => count($blogs).' Articles In '.$category->name, 'blogs' => $blogs]);

    return view('blogs', ['title' => count($category->blogs).' Articles In '.$category->name, 'blogs' => $category->blogs]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'CONTACT PAGE']);
});


