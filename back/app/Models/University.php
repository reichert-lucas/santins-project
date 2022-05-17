<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory, Uuid;
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'alpha_two_code',
        'domains',
        'country',
        'state_province',
        'web_pages',
        'name'
    ];

    protected $casts = [
        'domains' => 'array',
        'web_pages' => 'array',
    ];

    public function search(string $search = null) 
    {   
        if (is_null($search)) return $this;

        return $this->where(function($query) use ($search) {
            $query->where('alpha_two_code', 'like', "%{$search}%")
                    ->orWhere('country', 'like', "%{$search}%")
                    ->orWhere('name', 'like', "%{$search}%");
        });
    }

    public function users()
    {
        return $this->belongsToMany(user::class, 'user_university');
    }    
}
