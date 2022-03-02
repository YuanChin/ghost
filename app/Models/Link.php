<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory, Traits\RecommendedResource;

    /**
     * The attributes that are mass assignable
     *
     * @var string[]
     */
    protected $fillable = [
        'title', 'link'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'links';
}
