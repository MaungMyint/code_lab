<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class category extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'name', 'slug','user_id',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ]
        ];
    }
    public function subcategory()
    {
        return $this->hasMany(subcategory::class, 'category_id', 'id');
    }
}
