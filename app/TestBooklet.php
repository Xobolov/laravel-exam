<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestBooklet extends Model
{
    protected $guarded =[];



    public function subject(){


        //   (<relational class>, <foreign key>, <local key>) 
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }
}
