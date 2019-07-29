<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    
    protected $fillable = [
       'type', 'notifiable_id', 'notifiable_type', 'data', 'read_at'
    ];
    protected $casts = [
        'data' => 'array',
    ];
    public function notifiable()
    {
        return $this->morphTo();
    }
}
