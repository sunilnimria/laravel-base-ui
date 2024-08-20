<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Qs;
use Illuminate\Http\Request;
use App\Repositories\UserRepo;
use Yajra\DataTables\DataTables;
use App\Repositories\MyClassRepo;
use App\DataTables\MyClassDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MyClass\ClassCreate;
use App\Http\Requests\MyClass\ClassUpdate;


class MyClassController extends Controller
{
    protected $my_class, $user;

    public function __construct(MyClassRepo $my_class, UserRepo $user)
    {
        $this->middleware('permission:class.view', ['only' => ['index', 'ajaxIndex'] ]);
        $this->middleware('permission:class.create', ['only' => ['create', 'store'] ]);
        $this->middleware('permission:class.edit', ['only' => ['edit', 'update'] ]);
        $this->middleware('permission:class.destroy', ['only' => ['destroy'] ]);

        $this->my_class = $my_class;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(MyClassDataTable $dataTable)
    {
        return $dataTable->render('backend.class.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['class_types'] = $this->my_class->getTypes();

        return view('backend.class.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClassCreate $request)
    {
        $data = $request->all();
        $mc = $this->my_class->create($data);

        // Create Default Section
        $s =[
            'my_class_id'   => $mc->id,
            'name'          => 'A',
            'active'        => 1,
            'teacher_id'    => NULL,
        ];

        $this->my_class->createSection($s);

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
        $data['c'] = $this->my_class->find($id);
        $data['class_types'] = $this->my_class->all();

        return view('backend.class.edit', $data) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClassUpdate $request, string $id)
    {
        $data = $request->only(['name']);
        $this->my_class->update($id, $data);

        $type = 'success';
        $arr = [
            'message' => 'Class updated successfully',
        ];
        return Qs::jsonResponse($type, $arr);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->my_class->delete($id);

        $type = 'success';
        $arr = [
            'message' => 'Class has been deleted.',
        ];
        return Qs::jsonResponse($type, $arr);
    }
}
