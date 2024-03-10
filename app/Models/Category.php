<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','parent_id','status','description','image'];


    public static function getTableName()
    {
        return with(new static)->getTable();
    }

    // Accessor
    public function getImageAttribute($value){
        if($value){
            return Storage::url($value);
        }else{
            return Storage::url('categories/default.png');
//            return asset('categories/default.png');
        }
    }

//    public function setImageAttribute($value){
//        $this->attributes['image'] =$value->store('categories', 'public');
//    }

    // Relations
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
