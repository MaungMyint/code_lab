<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class product extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = ['name', 'slug', 'price', 'description', 'image',  'subcategory_id','category_id', 'user_id', 'is_active'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
