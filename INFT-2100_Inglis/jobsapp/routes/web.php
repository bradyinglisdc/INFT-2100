<?php

use App\Models\JobListing;
use Illuminate\Support\Facades\Route;

/************************************
 * Home and Contact Read Operations
 ************************************/

// Home Page
Route::get('/', function () {
    return view('home');
});

// Contact Page
Route::get('/contact', function () {
    return view('contact');
});

/************************************
 * Job Listing CRUD Operations
 ************************************/

// Jobs Listing Index Page
Route::get('/jobs', function () {
    $jobs = JobListing::with('employer')->latest()->simplePaginate(3);
    return view('jobs.index', ['jobs' => $jobs]);
});

// Get Create - Job Listing
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::post('/jobs', function () {

    // Data validation
    request()->validate([
        'title' => ['required', 'min:5'],
        'salary' => ['required']
    ]);

    // Save Job Listing
    JobListing::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);
    return redirect('/jobs');
});

// GET Show - Job Listing
Route::get('/jobs/{id}', function ($id) {
    //dd($id);
    //$job = Arr::first(JobListing::all(), fn($job) => $job['id'] == $id);
    $job = JobListing::find($id);
    return view('jobs.show', ['job' => $job]);
});

// GET Edit - Job Listing
Route::get('/jobs/{id}/edit', function ($id) {
    $job = JobListing::find($id);
    return view('jobs.edit', ['job' => $job]);
});

// PATCH Update - Job Listing
Route::patch('/jobs/{id}', function ($id) {

    // Step 1: Validation
    request()->validate([
        'title' => ['required', 'min:5'],
        'salary' => ['required']
    ]);

    // Step 2: Authorization
    // TODO

    // Step 3: Find the job
    $job = JobListing::FindOrFail($id);

    // Step 4: Update changes
    $job->update([
        'title' => request('title'),
        'salary' => request('salary')
    ]);

    // Redirect to show updated job (jobs.show page)
    return redirect('/jobs/' .$job->id);
});

// DELETE - Job Listing
Route::delete('/jobs/{id}', function ($id) {

    // Step 1: Authorization
    // TODO

    // Step 2: Find and Delete
    JobListing::findOrFail($id)->delete();

    // Step 3: Redirect to Job Listing index page
    return redirect('/jobs');
});
