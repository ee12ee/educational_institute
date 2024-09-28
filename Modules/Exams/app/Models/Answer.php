<?php

namespace Modules\Exams\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Exams\Database\Factories\AnswerFactory;

class Answer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['answer_text','is_correct','question_id'];
    public function question(){
        return $this->belongsTo(Question::class);
    }

    // protected static function newFactory(): AnswerFactory
    // {
    //     // return AnswerFactory::new();
    // }
}
