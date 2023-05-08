<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    use HasFactory, Sluggable;

    /**
     * Summary of table
     * @var string
     */
    protected $table = 'chefs';

    /**
     * Summary of fillable
     * @var array
     */
    protected $fillable = [
        'user_id',
        'image',
        'name',
        'position',
        'twitter',
        'facebook',
        'instagram',
        'linkedin',
        'status',
    ];


    public function sluggable(): array
    {
        return [
            'slug'  => [
                'source'    =>      'name'
            ]
        ];
    }

}
