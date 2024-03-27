<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Filterable;
    public function steps()
    {
        return $this->hasMany(Step::class, 'step_id', 'id');
    }
    public function statuses()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function types()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
    public function subjects()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
    public function levls()
    {
        return $this->belongsTo(Levl::class, 'levl_id', 'id');
    }
    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites', 'post_id', 'user_id');
    }
}
