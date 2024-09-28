<?php

namespace Modules\Classes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Auth\Models\Student;
use Modules\Auth\Models\Teacher;
use Modules\Exams\Models\Task;
// use Modules\Classes\Database\Factories\SubjectFactory;

class Subject extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name','description','status','teacher_id','course_id'];
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function lessons(){
        return $this->hasMany(Lesson::class);
    }
    public function enrollments() {
        return $this->morphToMany(Student::class, 'enrollable', 'enrollments');
    }
    public function tasks(){
        return $this->hasMany(Task::class);
    }

    // protected static function newFactory(): SubjectFactory
    // {
    //     // return SubjectFactory::new();
    // }
}
