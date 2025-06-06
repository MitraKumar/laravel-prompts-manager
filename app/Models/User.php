<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function prompts() {
        return $this->hasMany(Prompt::class);
    }

    public function followers() {
        return $this->belongsToMany(
            User::class,
            table: 'follower_user',
            relatedPivotKey: 'follower_id',
            foreignPivotKey: 'followee_id',
        );
    }

    public function followings() {
        return $this->belongsToMany(
            User::class,
            table: 'follower_user',
            foreignPivotKey: 'follower_id',
            relatedPivotKey: 'followee_id',
        );
    }

    public function logs() {
        return $this->hasMany(Log::class);
    }
}
