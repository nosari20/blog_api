<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SearchableTrait;

class Post extends Model
{
    use SearchableTrait;
    
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'title' => 10,
            'subtitle' => 10,
            'content' => 2,
        ]
    ];
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

    public function scopeMini($query)
    {
        return $query->select(array('id','title','sluged_title', 'subtitle', 'category_id', 'created_at', 'updated_at'));
    }
    
}
