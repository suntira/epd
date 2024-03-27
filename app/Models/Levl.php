<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Levl extends Model
{
    use HasFactory;
    public function levl()
    {
        return $this->hasMany(Post::class, 'levl_id', 'id');
    }
}
