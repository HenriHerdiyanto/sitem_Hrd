<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shiff extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'shiffs';
    protected $fillable = [
        'user_id',
        'shiff',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
