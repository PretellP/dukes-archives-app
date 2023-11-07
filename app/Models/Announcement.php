<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $table = 'announcements';

    protected $fillable = [
        'description',
        'status'
    ];

    public function file()
    {
        return $this->morphOne(File::class, 'fileable');
    }
}
