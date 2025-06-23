<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    public function scopeFilter_loan($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('delivery_date', 'like', '%' . $search . '%')
                ->orWhere('return_date', 'like', '%' . $search . '%')
                ->orWhere('delivery_time', 'like', '%' . $search . '%')
                ->orWhere('return_time', 'like', '%' . $search . '%')
                ->orWhere('delivery_bike', 'like', '%' . $search . '%')
                ->orWhere('return_bike', 'like', '%' . $search . '%');
        });
    }
    
    protected $guarded = [
        'id'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function motor(){
        return $this->belongsTo(Motor::class);
    }
    
}
