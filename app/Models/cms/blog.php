<?php
namespace App\Models\cms;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    Protected $table = 'blogs';

    public function tags(){
        return $this->belongsToMany('App\Model\cms\tag');
    }

    public function category_join(){
        return $this->belongsTo('App\Model\cms\category');
    }
}
