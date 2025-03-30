<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prompt extends Model
{
    protected $fillable = [
        "name",
        "description",
        "question",
        "result",
        "user_id",
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
