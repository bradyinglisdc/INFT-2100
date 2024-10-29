<?php

use App\Models\JobListing;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs',  ['jobs' => JobListing::all()]);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/jobs/{id}', function ($id) {

    $job = JobListing::find($id);
    return view('job', ['job' => $job]);
});




