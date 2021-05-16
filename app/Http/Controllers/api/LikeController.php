<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reply;

class LikeController extends Controller
{
    public function like(Reply $reply){
        $reply->likes()->create([
            'user_id' => '1',
        ]);
    }
    public function unlike(Reply $reply){
        $reply->likes()->where('user_id', '1')
                        ->first()
                        ->delete();
    }
}
