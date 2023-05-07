<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'menus';


    protected $fillable = [
        'user_id',
        'tag_id',
        'category_id',
        'name',
        'price',
        'image',
        'status',
    ];


    /**
     * Summary of sluggable
     * @return array<array>
     */
    public function sluggable(): array
    {
        return [
            'slug'  => [
                'source'    => 'name'
            ]
        ];
    }

    /**
     * Get the user that owns the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * The categories that belong to the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_menu', 'menu_id', 'category_id');
    }

    /**
     * Get the tag that owns the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }
}
