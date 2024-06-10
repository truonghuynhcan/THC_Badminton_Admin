<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_cate', 'id_user', 'img', 'title', 'slug', 'sub_title', 'date', 'content', 'view', 'thumb_up', 'heart'
    ]; 
    
    public function category()
    {
        return $this->belongsTo(NewsCate::class, 'id_cate');
    }
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
