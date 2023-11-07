<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'author',
        'purchase_price',
        'sale_price',
        'status'
    ];

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }

    public function labels()
    {
        return $this->belongsToMany(Label::class, 'product_labels', 'product_id', 'label_id')
                    ->withTimestamps();
    }

    public function desiredUsers()
    {
        return $this->belongsToMany(User::class, 'desired', 'product_id', 'user_id')
                    ->withPivot(['quantity'])
                    ->withTimestamps();
    }

    public function shoppingCartUsers()
    {
        return $this->belongsToMany(User::class, 'shopping_cart', 'product_id', 'user_id')
                    ->withPivot(['quantity'])
                    ->withTimestamps();
    }

    public function sales()
    {
        return $this->belongsToMany(Sale::class, 'sale_details', 'product_id', 'sale_id')
                    ->withPivot(['quantity'])
                    ->withTimestamps();
    }

    public function ratings()
    {
        return $this->belongsToMany(User::class, 'product_ratings', 'product_id', 'user_id')
                    ->withPivot(['description', 'quantity'])
                    ->withTimestamps();
    }
}
