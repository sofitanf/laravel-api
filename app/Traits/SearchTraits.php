<?php

namespace App\Traits;


trait searchTraits
{
    public function scopeSearch($query,$column,$param){
        $query->when($param, function ($query) use ($column,$param) {
            $query->where($column,$param);
         });
    }

    public function scopeSearchLike($query,$column,$param){
        $query->when($param, function ($query) use ($column,$param) {
            $query->where($column, 'like', '%' . $param . '%');
         });
    }
}
