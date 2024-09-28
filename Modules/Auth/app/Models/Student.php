<?php

namespace Modules\Auth\Models;


use GuzzleHttp\Promise\TaskQueue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Classes\Models\Course;
use Modules\Classes\Models\Subject;
use Modules\Exams\Models\Task;
// use Modules\Auth\Database\Factories\StudentFactory;

class Student extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['first_name','last_name','address','phone','email','password','address'];
    protected static function booted(): void
    {
        static::creating(function (Student $student) {
            $student->address = request()->city.','.request()->street;
        });
    }
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
    public function courses() {
        return $this->morphedByMany(Course::class, 'enrollable', 'enrollments');
    }

    public function subjects() {
        return $this->morphedByMany(Subject::class, 'enrollable', 'enrollments');
    }
    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'student_task_results')
                    ->withPivot('score');
                   
    }
    // protected static function newFactory(): StudentFactory
    // {
    //     // return StudentFactory::new();
    // }
}
