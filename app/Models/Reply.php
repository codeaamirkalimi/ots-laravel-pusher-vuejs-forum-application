<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    //body, question_id, user_id
    protected $fillable = [
        'body',
        'question_id',
        'user_id',
    ];

    public function getPathAttribute(){
        // return asset("api/questions/$this->question_id");
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function question(){
        return $this->belongsTo(Question::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
}
