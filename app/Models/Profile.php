<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed $user_id
 * @property mixed $role
 * @property mixed $user
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
     * Get the user that owns the Profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
