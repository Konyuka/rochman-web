<?php
namespace App\Models\cms;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    Protected $table = 'tags';

    public function blogs(){
        return $this->belongsToMany('App\Model\cms\blog');
    }
}
