<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RegistrantType extends Model
{
    use softDeletes;

    protected $table = 'registrant_type';

    protected $fillable = [
        'name',
    ];

    public function registrant(): HasOne
    {
        return $this->hasOne(Phone::class);
    } 

}
