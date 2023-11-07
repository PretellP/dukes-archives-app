<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'nickname',
        'name',
        'lastname', 
        'gender', 
        'birthdate', 
        'document_type',
        'document_number',
        'phone',
        'status',
        'role_id',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function file()
    {
        return $this->morphOne(File::class, 'fileable');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function clientDetail()
    {
        return $this->hasOne(ClientDetail::class);
    }

    public function desired()
    {
        return $this->belongsToMany(Product::class, 'desired', 'user_id', 'product_id')
                    ->withPivot(['quantity'])
                    ->withTimestamps();
    }

    public function shoppingCart()
    {
        return $this->belongsToMany(Product::class, 'shopping_cart', 'user_id', 'product_id')
                    ->withPivot(['quantity'])
                    ->withTimestamps();
    }

    public function orders()
    {
        return $this->hasMany(Sale::class);
    }

    public function productRatings()
    {   
        return $this->belongsToMany(Product::class, 'product_ratings', 'user_id', 'product_id')
                    ->withPivot(['description', 'quantity'])
                    ->withTimestamps();
    }


    // --------- MUTATORS Y ACCESSORS ---------

    public function getFullNameAttribute()
    {
        return $this->name. ' ' . $this->lastname;
    }

    public function getGenderNameAttribute()
    {
        return config('parameters.genders')[$this->gender];
    }

    public function getDocumentTypeNameAttribute()
    {
        return config('parameters.document_types')[$this->document_type];
    }

    public function getBirthOnlyDateAttribute()
    {
        return Carbon::parse($this->birthdate)->format('Y-m-d');
    }
}
