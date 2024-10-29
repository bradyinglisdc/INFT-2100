<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class JobListing extends Model
{
    use HasFactory;

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

}
