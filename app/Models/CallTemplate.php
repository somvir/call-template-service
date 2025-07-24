<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CallTemplate extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'prompt', 'company_id','is_active'];

    protected static function booted()
    {
        static::addGlobalScope('company', function (Builder $builder) {
            if (\Illuminate\Support\Facades\Auth::check()) {
                $builder->where('company_id', \Illuminate\Support\Facades\Auth::user()->company_id);
            }
        });
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
