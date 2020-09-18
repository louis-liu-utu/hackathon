<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvitedCode extends Model
{
    const STATUS_CREATE = 0;
    const STATUS_SENT = 1;
    const STATUS_VERIFIED = 2;
    const STATUS_EXPIRED = -1;

    public $timestamps = true;

    protected $fillable = [
        'code',
        'sent_at',
        'customer_id',
        'expired_by',
        'status'
    ];


    public function customer() {
        return $this->belongsTo('App\Customer');
    }

    public function getStatus() {
        if($this->status === self::STATUS_CREATE) return 'created';
        if($this->status === self::STATUS_SENT) return 'sent';
        if($this->status === self::STATUS_VERIFIED) return 'verified';
        if($this->status === self::STATUS_EXPIRED) return 'expired';
    }
}
