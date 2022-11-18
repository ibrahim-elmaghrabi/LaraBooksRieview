<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id' , 'topic_id' , 'title' , 'image' , 'body' , 'publish' , 'rate'] ;

    public function scopeFilter($query , array $filters){

        if($filters['search'] ?? false){
            $query->where
            ('title' , 'like' , '%'.request('search').'%' )->orWhere
            ('body' , 'like' , '%'.request('search').'%' ) ;
        }
    }
     public function user(){
        return $this->belongsTo(User::class) ;
    }

    public function topic(){
        return $this->belongsTo(Topic::class) ;
    }

}
