<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryNews extends Model
{
    use HasFactory;

    protected $table = "new_categories";

    protected $fillable = ['name','type'];

    public function getNews(){
        return $this->hasMany(News::class,'cate_id');
    }
}
