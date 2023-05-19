<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Notifiable;
    protected $fillable = ['title','body','category_id'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
    public function tagStr(){
        $tagArray=[];
        foreach($this->tags as $tags){
            $tagArray[] = $tags->title;
        }
        $tagStr = implode(',',$tagArray);
        return $tagStr;
    }
}
