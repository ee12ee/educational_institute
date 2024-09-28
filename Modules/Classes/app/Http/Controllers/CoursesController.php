<?php

namespace Modules\Classes\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Classes\Http\Requests\CourseRequest;
use Modules\Classes\Models\Course;

class CoursesController extends Controller
{
    public function index(){
        $courses=Course::all();
        return $this->sendResponse(200,'the courses are',$courses);

    }
    public function store(CourseRequest $request){
        Course::create($request->validated());
        return $this->sendResponse(201, 'the course is created successfully');
    }
    public function update(CourseRequest $request, Course $course){
           $course->update($request->validated());
           return $this->sendResponse(200,'course is updated successfully');
    }
    public function show(Course $course){
        return $this->sendResponse(200,'the course is',$course);
    }
    
}
