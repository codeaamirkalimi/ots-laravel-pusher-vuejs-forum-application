<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        //title, slug, body, category_id, user_id
        'title',
        'slug',
        'body',
        'category_id',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function replies(){
        return $this->hasMany(Reply::class);
    }

    //use slug in url instead id
    public function getRouteKeyName()
    {
        return 'slug';
    }
    //slug path attribute for resource
    public function getPathAttribute(){
        return asset("api/questions/$this->slug");
    }
}
