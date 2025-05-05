<?php

namespace App\Http\Controllers;

use App\Actions\Course\CreateCourseAction;
use App\Actions\Course\DeleteCourseAction;
use App\Actions\Course\GetCourseAction;
use App\Actions\Course\GetOneCourseAction;
use App\Actions\Course\UpdateCourseAction;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request){
        return GetCourseAction::execute($request);
    }

    public function store(Request $request){
        return CreateCourseAction::execute($request);
    }

    public function update(UpdateCourseRequest $request, $course_id){
        return UpdateCourseAction::execute($request, $course_id);
    }

    public function destroy($course_id){
        return DeleteCourseAction::execute($course_id);
    }

    public function show($course){
        return GetOneCourseAction::execute($course);
    }
}
