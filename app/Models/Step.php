<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;
    protected $fillable = [
        'text_st',
        'img_st',
        'order',
        'post_id',
    ];
    protected $primaryKey = 'id';
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

}
