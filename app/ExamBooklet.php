<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamBooklet extends Model
{
    protected $guarded =[];

    public function exam()
    {
        return $this->hasOne(Exam::class, 'id', 'exam_id');
    }

    public function test_booklet()
    {
        return $this->hasOne(TestBooklet::class, 'id', 'test_booklet_id');
    }
}
