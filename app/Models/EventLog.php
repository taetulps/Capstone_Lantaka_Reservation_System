<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventLog extends Model
{
    protected $table = 'event_logs';

    protected $fillable = [
        'user_id',
        'notifiable_user_id',
        'action',
        'title',
        'message',
        'type',
        'link',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    /** The admin / staff / client who performed the action */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /** The client who should see this as a notification */
    public function notifiableUser()
    {
        return $this->belongsTo(User::class, 'notifiable_user_id');
    }
}
