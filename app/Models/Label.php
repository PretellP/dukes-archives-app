<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    protected $table = 'labels';

    protected $fillable = [
        'name',
        'description',
        'status'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_labels', 'label_id', 'product_id')
                    ->withTimestamps();
    }
}
