<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class submission extends Model
{
    use softDeletes;

    protected $table = 'submission_db';

    protected $fillable = [
        'name',
        'url',
        'permission_status',
        'registrant_id',
    ];

    public function registrant()
    {
        return $this->belongsTo(Registrant::class, 'registrant_id');
    }

    public function gj_event(): BelongsTo
    {
        return $this->belongsTo(GJEvent::class);
    }

}
