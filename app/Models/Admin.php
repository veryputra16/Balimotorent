<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

// class Admin extends Model
class Admin extends Authenticatable
{
    // use HasFactory;
    use HasFactory, Notifiable;

    protected $guarded = [
        'id'
    ];

    public function information()
    {
        return $this->belongsToMany(Information::class, 'admins', 'id');
    }

    public function skill()
    {
        return $this->hasMany(Skill::class);
    }

    public function education()
    {
        return $this->hasMany(Education::class);
    }

    protected $table = 'admins'; // Pastikan tabel yang benar

    protected $fillable = [
        'name', 
        'username',
        'password',
        'status',
        'country',
        'information_id',
        'skill_id',
        'education_id',
        'image'
    ];

    protected $hidden = [
        'password', // Supaya password tidak terlihat saat mengambil data
        'remember_token',
    ];


    // public static function findByUsername($username)
    // {
    //     return self::where('username', $username)->first();
    // }
}
