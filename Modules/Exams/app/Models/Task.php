<?php

namespace Modules\Exams\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Auth\Models\Student;
use Modules\Classes\Models\Subject;
// use Modules\Exams\Database\Factories\TaskFactory;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title','description','type','status','subject_id'];
    public function subject(){
        return $this->belongsTo(Subject::class);
    }
    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_task_results')
                    ->withPivot('score');
                    
    }

    // protected static function newFactory(): TaskFactory
    // {
    //     // return TaskFactory::new();
    // }
}
