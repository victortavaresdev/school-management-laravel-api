<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Classes extends Model
{
    use HasUuids;

    protected $fillable = [
        'name',
        'description'
    ];

    public function students()
    {
        return $this->belongsToMany(Students::class, 'classes_students');
    }
}
