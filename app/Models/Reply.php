<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'content'
    ];


    

    /**
     * Get the user that owns the reply
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the topic that owns the reply
     *
     * @return void
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
