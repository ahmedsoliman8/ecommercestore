<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Nicolaslopezj\Searchable\SearchableTrait;

class City extends Model
{
    use HasFactory, SearchableTrait;
    protected $guarded = [];

    public $searchable = [
        'columns'=> [
            'cities.name' => 10,
        ]
    ];

    public $timestamps = false;

    public function status()
    {
        return $this->status ? 'Active' : 'Inactive';
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }
}