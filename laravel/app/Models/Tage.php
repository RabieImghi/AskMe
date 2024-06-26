<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tage extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'descriprtion'
    ];
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
