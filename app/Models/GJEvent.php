<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class GJEvent extends Model
{
    //
    use softDeletes;

    protected $table = 'gj_event';
    protected $fillable = [
        'code',
        'name',
        'theme',
        'start_date',
        'end_date',
        'limitations',
        'notes'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function registrant(): HasMany
        {
            return $this->hasMany(Registrant::class);
        }
    
    public function submission_db(): HasMany
    {
        return $this->hasMany(SubmissionsDb::class);
    }
        
}
