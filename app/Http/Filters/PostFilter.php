<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    public const NAME_POST = 'name_post';
    public const DESCRIPTION = 'description';
    public const TYPE_ID = 'type_id';  
    public const SUBJECT_ID = 'subject_id';
    public const LEVL_ID = 'levl_id';
    


    protected function getCallbacks(): array
    {
        return [
            self::NAME_POST => [$this, 'name_post'],
            self::DESCRIPTION => [$this, 'description'],
            self::TYPE_ID => [$this, 'typeId'],
            self::SUBJECT_ID => [$this, 'subjectId'],
            self::LEVL_ID => [$this, 'levlId'],
        ];
    }

    public function name_post(Builder $builder, $value)
    {
        $builder->where('name_post', 'like', "%{$value}%")
        ->orWhere('description', 'like', "%{$value}%"); 
    }
    public function typeId(Builder $builder, $value)
    {
        $builder->where('type_id', $value);
    }
    public function subjectId(Builder $builder, $value)
    {
        $builder->where('subject_id', $value);
    }
    public function levlId(Builder $builder, $value)
    {
        $builder->where('levl_id', $value);
    }
}
