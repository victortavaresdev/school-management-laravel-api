<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Students extends Model
{
    use HasUuids;

    protected $fillable = [
        'first_name',
        'last_name',
        'age',
        'gender',
        'email'
    ];

    public function classes()
    {
        return $this->belongsToMany(Classes::class, 'classes_students');
    }
}
