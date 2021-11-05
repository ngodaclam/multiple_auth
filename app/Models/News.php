<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = "news";

    protected $fillable = [
        "title","image","content","user_id","cate_id","short","type"
    ];

    public function getCate(){
        return $this->belongsTo(CategoryNews::class,'cate_id');
    }

    public function getUser(){
        return $this->belongsTo(User::class,'user_id');
    }
}
