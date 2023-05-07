<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'tags';


    protected $fillable = [
        'tag',
        'status'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'tag'
            ]
        ];
    }

    /**
     * Get all of the menus for the Tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class, 'tag_id', 'id');
    }
}
