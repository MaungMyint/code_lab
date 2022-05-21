<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class comment extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['product_id', 'user_id', 'message', 'slug'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'message',
            ],
        ];
    }
    public function news()
    {
        return $this->belongsTo(Product::class);
    }
}
