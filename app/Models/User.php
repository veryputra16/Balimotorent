<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'username',
        'password',
        'email',
        'tgl_lahir',
        'j_kelamin',
        'telpon',
        'image'
    ];

      /**
     * Menggunakan username sebagai key untuk route model binding
     */
    public function getRouteKeyName()
    {
        return 'username';
    }

    // public function scopeFilter_user($query, array $filters)
    // {
    //     $query->when($filters['search_user'] ?? false, function ($query, $search_user) {
    //         return $query->where('name', 'like', '%' . $search_user . '%')
    //             ->orWhere('username', 'like', '%' . $search_user . '%')
    //             ->orWhere('email', 'like', '%' . $search_user . '%')
    //             ->orWhere('telpon', 'like', '%' . $search_user . '%');
    //     });
    // }
    
    
}
