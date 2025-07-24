<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function calls(): HasMany
    {
        return $this->hasMany(Call::class);
    }

    public function templates(): HasMany
    {
        return $this->hasMany(CallTemplate::class);
    }
}
