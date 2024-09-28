<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Modules\Auth\Http\Requests\LoginStudentRequest;
use Modules\Auth\Http\Requests\RegisterAdminRequest;
use Modules\Auth\Http\Requests\RegisterTeacherRequest;
use Modules\Auth\Models\Admin;
use Modules\Auth\Models\Teacher;
use Modules\Auth\services\AuthService;
use Modules\Auth\Http\Requests\LoginRequest;
use Modules\Auth\Http\Requests\registerStudentRequest;
use Modules\Auth\Models\Student;

class AuthController extends Controller
{
    public function registerStudent(registerStudentRequest $request, AuthService $service){
        $token=$service->register($request,Student::class);
        return $this->sendResponse(201,'you are registerd successfully',$token);
     }
     public function loginStudent(LoginStudentRequest $request,AuthService $service){
        if($token= $service->login($request,'student'))
          return $this->sendResponse(200,'you logged successfully',$token);
        else    
          return $this->sendResponse(401,'you are not registered');
     }
     public function registerTeacher(RegisterTeacherRequest $request ,AuthService $service){
        $token=$service->register($request,Teacher::class);
        return $this->sendResponse(201,'teacher are registerd successfully',$token);

     }
     public function loginTeacher(LoginRequest $request, AuthService $service){
        $token= $service->login($request,'teacher');
        return $this->sendResponse(200,'you logged successfully',$token);
     }
     public function registerAdmin(RegisterAdminRequest $request, AuthService $service){
        $token=$service->register($request,Admin::class);
        return $this->sendResponse(201,'admin are registerd successfully',$token);
     }
     public function loginAdmin(LoginRequest $request, AuthService $service){
        $token= $service->login($request,'admin');
        return $this->sendResponse(200,'you logged successfully',$token);
     }
     public function logout(){
    request()->user()->tokens()->delete();
    return $this->sendResponse(200,'you are logged uccessfully');
 }
    
}
