<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Registrant extends Model
{
    use SoftDeletes;

    protected $table = 'registrant';

    protected $fillable = [
        'team_name',
        'team_members',
        'team_rep_email',
        'registrant_type_id',
        'gj_event_id',
        'user_id',
        'user_user_type_id',
        
    ];

    public function gj_event(): BelongsTo
    {
        return $this->belongsTo(GJEvent::class);
    }

    public function registrantType(): BelongsTo
    {
        return $this->belongsTo(RegistrationType::class, 'registrant_type_id');
    }

    public function submission_db(): HasOne
    {
        return $this->hasOne(SubmissionsDb::class);
    }


}
