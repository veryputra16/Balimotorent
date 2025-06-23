<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('engine', 'like', '%' . $search . '%')
                ->orWhere('price', 'like', '%' . $search . '%');
        });
    }

    protected $fillable = [
        'name', 'merk', 'year', 'image', 'transmition', 'engine', 'fuel', 'helm', 'coat', 'stok', 'price'
    ];
}
