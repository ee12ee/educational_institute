<?php

namespace Modules\Classes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Auth\Models\Student;
// use Modules\Classes\Database\Factories\CourseFactory;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name','description','status'];
    public function subjects(){
        return $this->hasMany(Subject::class);
    }
    public function enrollments() {
        return $this->morphToMany(Student::class, 'enrollable', 'enrollments');
    }

    // protected static function newFactory(): CourseFactory
    // {
    //     // return CourseFactory::new();
    // }
}
