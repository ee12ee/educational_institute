<?php

namespace Modules\Exams\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Exams\Database\Factories\QuestionFactory;

class Question extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['question_text','task_id'];
    public function task(){
        return $this->belongsTo(Task::class);
    }

    // protected static function newFactory(): QuestionFactory
    // {
    //     // return QuestionFactory::new();
    // }
}
