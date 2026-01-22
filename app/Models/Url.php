<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    function company()
    {
        return $this->belongsTo(Company::class);
    }
    function user()
    {
        return $this->belongsTo(User::class);
    }
}
