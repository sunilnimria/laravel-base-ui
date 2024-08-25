<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Qs;
use App\Models\State;
use App\Models\Country;
use App\Models\MyClass;
use App\Models\District;
use Pest\Arch\Blueprint;
use App\Models\BloodGroup;
use Illuminate\Http\Request;
use App\DataTables\StudentDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StudentCreate;
use App\Http\Requests\Student\StudentUpdate;
use App\Models\Section;
use App\Models\Student;
use App\Traits\FileTrait;

class StudentsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(StudentDataTable $dataTable)
    {
        return $dataTable->render('backend.student.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['bloodGroups'] = BloodGroup::all();
        $data['classes'] = MyClass::with(['sections'])->get();
        $data['countries'] = Country::all();
        $countary = Country::select(['id'])->where('country_code', '=', 'IN')->first();
        $data['states'] = State::where('country_id', '=', $countary->id)->get();
        $state = state::select(['id'])->where('state_code', '=', 'HR')->first();
        $data['districts'] = District::where('state_id', '=', $state->id)->get();
        return view('backend.student.create', $data );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentCreate $request)
    {
        $input = $request->except('_token','_method', 'photo');
        $student= new Student();

        if ($request->photo != '' && $request->hasFile('photo')) {

            $file = $request->file('photo');
            $path =   Qs::getPublicUploadPath('students/');

            $photo = $student->uploadFile( $file, $path, 'public' );


            $input['photo'] = $photo->id;
        }
        $input['reg_class'] = $request->my_class_id;
        // dd($input);
        Student::create($input);
        $type = 'success';
        $arr = [
            'message' => 'Class saved successfully',
        ];
        return Qs::jsonResponse($type, $arr);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        // $student = $student->with('my_class','section');
        return view('backend.student.show', [
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $countary = Country::select(['id'])->where('country_code', '=', 'IN')->first();
        $state = state::select(['id'])->where('state_code', '=', 'HR')->first();
        return view('backend.student.edit', [
            'student' => $student,
            'bloodGroups' => BloodGroup::all(),
        'classes' => MyClass::with(['sections'])->get(),
        'countries' => Country::all(),
        'sections' => Section::where('my_class_id', '=', $student->my_class_id)->get(),
        'states' => State::where('country_id', '=', $student->country_id)->get(),
        'districts' => District::where('state_id', '=', $student->state_id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentUpdate $request, Student $student)
    {
        $input = $request->except('_token','_method', 'photo');

        if ($request->photo != '' && $request->hasFile('photo')) {

            $file = $request->file('photo');
            $path =   Qs::getPublicUploadPath('students/');

            $photo = $student->uploadFile( $file, $path, 'public' );


            $input['photo'] = $photo->id;
        }
        $input['reg_class'] = $request->my_class_id;
        if( $request->password == '' ){
            $input['password'] = $student->password;
        }
        // dd($input);
        $student->update($input);

        $type = 'success';
        $arr = [
            'message' => 'Student profile has been updated.',
        ];
        return Qs::jsonResponse($type, $arr);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        if (!$student) {
            $type = 'error';
        $arr = [
            'message' => 'Student not found.',
        ];
        }

        $student->delete();

        $type = 'success';
        $arr = [
            'message' => 'Student has been deleted.',
        ];
        return Qs::jsonResponse($type, $arr);
    }
}
