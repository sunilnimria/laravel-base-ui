<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Qs;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Traits\AuthorizationChecker;
use App\Http\Requests\SettingsRequest;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view(
            'backend.dashboard.index',
            [
                'total_admins' => User::count(),
                'total_roles' => Role::count(),
                'total_permissions' => Permission::count(),
            ]
        );
    }

    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        $settings = GeneralSetting::all();

        $data = [];
        foreach ($settings as $key) {
            $data[$key->option_name] = $key->option_value;
        }

        return view('backend.settings.index',)->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SettingsRequest $request)
    {

        $input = $request->safe()->except('_token','_method', 'logo', 'fevicon');

        if ($request->logo != '' && $request->hasFile('logo')) {

            $logo = GeneralSetting::where('option_name', '=', 'logo')->first();

            $file = $request->file('logo');
            $path =   Qs::getPublicUploadPath('setting/');

            $savedFile = $logo->uploadFile( $file, $path, 'public' );

            $fileName = $path . $savedFile->slug;


            if( $savedFile == '' ){
                $fileName = 'uploads/default/logo.png' ;
            }
            $input['logo'] = $fileName;
        }

        if ($request->fevicon != '' && $request->hasFile('fevicon')) {

            $fevicon = GeneralSetting::where('option_name', '=', 'fevicon')->first();

            $file = $request->file('fevicon');
            $path =   Qs::getPublicUploadPath('setting/');

            $savedFile =  $fevicon->uploadFile($file, $path, 'public');
            $fileName = $path . $savedFile->slug;

            if( $savedFile == '' ){
                $fileName = 'uploads/default/fevicon.png' ;
            }

            $input['fevicon'] = $fileName;
        }


        foreach ($input as $key => $value) {
            if ( $value ) {
                $saved  =GeneralSetting::updateOrCreate(
                    [
                        'option_name' => $key
                    ],
                    [
                        'option_name' => $key,
                        'option_value' => $value
                    ]
                );
            }
        }
        if ( $saved ) {
            $type = 'success';
            $arr = ['message' => 'Category added successfully'];
        } else {
            $type = 'error';
            $arr = [
            ];

        }
        return Qs::jsonResponse($type ,$arr);
    }

    public function reset() {

        $setting = new GeneralSetting();
        $data = $setting->defaultData();

        foreach ($data as $key) {
            $setting->create($key);
        }



        $type = 'deleted';
        $arr = [
            'message' => 'Setting Reset successfully',
        ];

        return Qs::jsonResponse($type, $arr);
    }
}
