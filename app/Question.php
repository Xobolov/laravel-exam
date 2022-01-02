<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded =[];

    public function test_booklet()
    {
        return $this->hasOne(TestBooklet::class, 'id', 'test_booklet_id');
    }

    public function exam()
    {
        return $this->hasOne(Exam::class, 'id', 'exam_id');
    }
}
