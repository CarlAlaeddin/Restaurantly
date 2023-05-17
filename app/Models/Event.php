<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Event extends Model
{
    use HasFactory, Sluggable, Notifiable;

    /**
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * @var string
     */
    protected $table = 'events';
    /**
     * @var string[]
     */
    protected $hidden = [
        'updated_at'
    ];
    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'image',
        'title',
        'slug',
        'price',
        'body',
        'status',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
