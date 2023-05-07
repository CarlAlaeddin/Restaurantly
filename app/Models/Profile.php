<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed $user_id
 */
class Profile extends Model
{
    use HasFactory , SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'profiles';


    /**
     * @var string[]
     */
    protected $hidden = ['deleted_at'];


    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'image',
        'phone_number',
        'address',
        'beloved',
        'biography',
        'status',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

}
