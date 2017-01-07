<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function full(){
        if($this instanceof Post){
            $this->category = $this->category()->first();
            unset($this->category_id);
        }        
        return $this;

    }

    public function search($search){

        return $this->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('subtitle', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");

    }
}
