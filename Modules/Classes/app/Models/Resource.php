<?php

namespace Modules\Classes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Classes\Database\Factories\ResourceFactory;

class Resource extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name','description','type','file','lesson_id'];
    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }

    // protected static function newFactory(): ResourceFactory
    // {
    //     // return ResourceFactory::new();
    // }
}
