<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserType extends Model
{
    use softDeletes;

    protected $table = 'user_type';

    protected $fillable = [
        'name',
    ];

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }

}
