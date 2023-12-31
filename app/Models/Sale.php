<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'sales';

    protected $fillable = [
        'date', 
        'hour',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->belongsToMany(Product::class, 'sale_details', 'sale_id', 'product_id')
                    ->withPivot(['quantity'])
                    ->withTimestamps();
    }
}
