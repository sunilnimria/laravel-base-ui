<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SubjectDataTable;
use App\Helpers\Qs;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Repositories\UserRepo;
use Yajra\DataTables\DataTables;
use App\Repositories\MyClassRepo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Subject\SubjectCreate;
use App\Http\Requests\Subject\SubjectUpdate;

class SubjectController extends Controller
{
    protected $my_class, $user;

    public function __construct(MyClassRepo $my_class, UserRepo $user)
    {
        $this->middleware('permission:subject.view', ['only' => ['index', 'ajaxIndex']]);
        $this->middleware('permission:subject.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:subject.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:subject.destroy', ['only' => ['destroy']]);

        $this->my_class = $my_class;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     */
    public function index( SubjectDataTable $dataTable)
    {
        return $dataTable->render('backend.subject.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['classes'] = $this->my_class->all();
        $data['teachers'] = $this->my_class->getUserByType('teacher');

        return view('backend.subject.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubjectCreate $request)
    {
        $data = $request->all();
        $this->my_class->createSubject($data);

        $type = 'success';
        $arr = [
            'message' => 'Subject saved successfully',
        ];
        return Qs::jsonResponse($type, $arr);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['subject'] = $this->my_class->findSubject($id);
        $data['classes'] = $this->my_class->all();
        $data['teachers'] = $this->my_class->getUserByType('Teacher');

        return view('backend.subject.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubjectUpdate $request, $id)
    {
        $data = $request->all();
        $this->my_class->updateSubject($id, $data);

        $type = 'success';
        $arr = [
            'message' => 'Section updated successfully',
        ];
        return Qs::jsonResponse($type, $arr);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        $type = 'success';
            $arr = [
                'message' => 'Subject has been deleted.',
            ];
        return Qs::jsonResponse($type, $arr);
    }
}
