<?php

use App\Models\JobListing;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    $jobs = JobListing::with('employer')->latest()->simplePaginate(3);
    return view('jobs.index', ['jobs' => $jobs]);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::post('/jobs', function () {
    JobListing::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);
    return redirect('/jobs');
});

Route::get('/jobs/{id}', function ($id) {
    //dd($id);
    //$job = Arr::first(JobListing::all(), fn($job) => $job['id'] == $id);
    $job = JobListing::find($id);
    return view('jobs.show', ['job' => $job]);
});


