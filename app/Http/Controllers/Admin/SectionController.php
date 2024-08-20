<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Qs;
use App\Models\MyClass;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Repositories\UserRepo;
use PhpParser\Node\Stmt\Return_;
use Yajra\DataTables\DataTables;
use App\Repositories\MyClassRepo;
use App\DataTables\SectionDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Section\SectionCreate;
use App\Http\Requests\Section\SectionUpdate;

class SectionController extends Controller
{
    protected $my_class, $user;

    public function __construct(MyClassRepo $my_class, UserRepo $user)
    {
        $this->middleware('permission:section.view', ['only' => ['index']]);
        $this->middleware('permission:section.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:section.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:section.view', ['only' => ['show']]);
        $this->middleware('permission:section.destroy', ['only' => ['destroy']]);

        $this->my_class = $my_class;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(SectionDataTable $dataTable)
    {
        return $dataTable->render('backend.section.index');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['classes'] = $this->my_class->all();
        $data['teachers'] = $this->my_class->getUserByType('teacher');
        return view('backend.section.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SectionCreate $request)
    {
        $data = $request->all();
        $this->my_class->createSection($data);

        $type = 'success';
        $arr = [
            'message' => 'Class saved successfully',
        ];
        return Qs::jsonResponse($type, $arr);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['section'] = $this->my_class->findSection($id);
        $data['classes'] = $this->my_class->all();
        $data['teachers'] = $this->my_class->getUserByType('teacher');
        return view('backend.section.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SectionUpdate $request, $id)
    {
        $data = $request->only(['name', 'teacher_id', 'active']);
        $this->my_class->updateSection($id, $data);

        $type = 'success';
        $arr = [
            'message' => 'Section updated successfully',
        ];
        return Qs::jsonResponse($type, $arr);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if ($this->my_class->isActiveSection($id)) {
            // return back()->with('pop_warning', 'Every class must have a default section, You Cannot Delete It');
            $type = 'error';
            $arr = [
                'message' => 'This is a active Section. You Cannot Delete It',
            ];
        } else {

            $this->my_class->deleteSection($id);
            $type = 'success';
            $arr = [
                'message' => 'Class has been deleted.',
            ];
        }
        return Qs::jsonResponse($type, $arr);
    }
}
