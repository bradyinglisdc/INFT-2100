<?php

use App\Models\JobListing;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    // $jobs = JobListing::with('employer')->get();

    // $jobs = JobListing::with('employer')->paginate(3);

    $jobs = JobListing::with('employer')->simplePaginate(3);

    // $jobs = JobListing::with('employer')->cursorPaginate(3);

    return view('jobs',  ['jobs' => $jobs]);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/jobs/{id}', function ($id) {

    $job = JobListing::find($id);
    return view('job', ['job' => $job]);
});
