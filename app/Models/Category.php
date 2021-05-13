<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        //title, slug, body, category_id, user_id
        'name',
        'slug'
    ];

    //use slug in url instead id
    public function getRouteKeyName()
    {
        return 'slug';
    }
    //slug path attribute for resource
    public function getPathAttribute(){
        return asset("api/categories/$this->slug");
    }

    // public function questions(){
    //     return $this->hasMany(Category::class);
    // }
}
