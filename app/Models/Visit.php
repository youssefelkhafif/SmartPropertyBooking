<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['user_id' , 'place_id', 'start_time', 'end_time', 'status' , 'stripe_session_id' ])]
class Visit extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
