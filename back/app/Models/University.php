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
        'state-province',
        'web_pages',
        'name'
    ];

    protected $casts = [
        'domains' => 'array',
        'web_pages' => 'array',
    ];
}
