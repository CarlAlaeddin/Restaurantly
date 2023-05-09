<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use JetBrains\PhpStorm\ArrayShape;

class Contact extends Model
{
    use HasFactory, Notifiable, Sluggable;

    /**
     * @var string[]
     */
    protected $table = ['contacts'];


    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'subject',
        'message',
        'status',
    ];


    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }


    /**
     * @return string[][]
     */
    #[ArrayShape(['slug' => "string[]"])] public function sluggable(): array
    {
        return [
            'slug'  =>  [
                'source'    =>  'subject'
            ]
        ];
    }
}
