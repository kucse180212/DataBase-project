<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    //protected $table='posts';//we are giving the class name post
    //protected $primaryKey='post_id';//defining the primary key
    use SoftDeletes;


}
