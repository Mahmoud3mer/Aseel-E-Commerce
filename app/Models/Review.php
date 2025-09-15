<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = ['comment', 'phone', 'subject', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
