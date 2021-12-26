<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // protected $fillable = ['title','body','excerpt','slug'];
    protected $guarded = ['id'];

    protected $with= ['category','author'];
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function author(){

        return $this->belongsTo(User::class,'user_id');

    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function  scopeFilter($query,array $filters){

        // if($filters['search']??false){
        //     $query->where('title','like','%'.$filters['search'].'%')
        //     ->orWhere('body','like','%'.$filters['search'].'%')
        //     ->orWhere('excerpt','like','%'.$filters['search'].'%');
        // }

        $query->when($filters['search']??false,function($query,$search){

            $query->where(fn($query)=>

            $query->where('title','like','%'.$search.'%')
            ->orWhere('body','like','%'.$search.'%')
            ->orWhere('excerpt','like','%'.$search.'%')

        );

        });
        $query->when($filters['category']??false,function($query , $category){

            // $query->whereExists(fn($query)=>
            // $query->from('categories')->whereColumn('categories.id','posts.category_id')
            // ->where('categories.slug',$category));

            $query->whereHas('category',function($query)use($category){

                $query->where('slug',$category);

            });

        });

        $query->when($filters['author']??false,function($query,$author){

            $query->whereHas('author',function($query)use($author){
                $query->where('username',$author);

            });

        });

        return $query;
    }
}
