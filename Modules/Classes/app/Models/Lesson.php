<?php

namespace Modules\Classes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Classes\Database\Factories\LessonFactory;

class Lesson extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title','content','order','subject_id'];
    public function subject(){
        return $this->belongsTo(Subject::class);
    }
    public function resources(){
        return $this->hasMany(Resource::class);
    }

    // protected static function newFactory(): LessonFactory
    // {
    //     // return LessonFactory::new();
    // }
}
