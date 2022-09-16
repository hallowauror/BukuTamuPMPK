<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Guest;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function guests()
    {
        return $this->hasMany(Guest::class);
    }
}
