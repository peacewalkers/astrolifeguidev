<?php

namespace App;
namespace App\Models;
use App\Payment;
use Illuminate\Http\Controller;

use Illuminate\Database\Eloquent\Model;


class Horoscope extends Model
{
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function payment() {
        return $this->hasOne(Payment::class);
    }
}