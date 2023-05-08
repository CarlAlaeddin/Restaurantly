<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Special extends Model
{
    use HasFactory, Sluggable;


    /**
     * Summary of table
     * @var string
     */
    protected $table = 'specials';

    /**
     * Summary of fillable
     * @var array
     */
    protected $fillable = [
        'user_id',
        'menu_name',
        'title',
        'image',
        'description',
        'status',
    ];

    /**
     * Summary of sluggable
     * @return array<array>
     */
    public function sluggable(): array
    {
        return [
            'slug'  =>  [
                'source'    =>  'title'
            ]
        ];
    }


    /**
     * Get the user that owns the special
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
