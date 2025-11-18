<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $fillable = ['name', 'description', 'birth_date', 'gender', 'image'];

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}
