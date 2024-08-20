<?php

namespace App\Helpers;

use App\Models\File;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Hashids\Hashids;

class Qs
{
    public static function displayError($errors)
    {
        foreach ($errors as $err) {
            $data[] = $err;
        }
        return '
                <div class="alert alert-danger alert-styled-left alert-dismissible">
									<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
									<span class="font-weight-semibold">Oops!</span> ' .
            implode(' ', $data) . '
							    </div>
                ';
    }

    public static function removeSplCHToStr( $str){
        return preg_replace('/[^A-Za-z0-9\-]/', '',str_replace(' ', '-', $str ));
    }

    public static function getPanelOptions()
    {
        return '    <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>';
    }

    public static function displaySuccess($msg)
    {
        return '<div class="alert alert-success alert-bordered">
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span><span class="sr-only">Close</span>
                    </button> ' .
            $msg . '  </div>
                ';
    }

    public static function getTeamEditor()
    {
        return ['admin', 'super_admin', 'editor'];
    }

    public static function getTeamAuthor()
    {
        return ['admin', 'super_admin', 'editor', 'author'];
    }


    public static function hash($id)
    {
        $date = date('dMY') . 'CJ';
        $hash = new Hash($date, 14);
        return $hash->make($id);
    }

    public static function getUserRecord($remove = [])
    {
        $data = ['name', 'email', 'phone', 'phone2', 'dob', 'gender', 'address', 'bg_id', 'nal_id', 'state_id', 'district_id'];

        return $remove ? array_values(array_diff($data, $remove)) : $data;
    }

    public static function getStaffRecord($remove = [])
    {
        $data = ['emp_date',];

        return $remove ? array_values(array_diff($data, $remove)) : $data;
    }

    public static function getStudentData($remove = [])
    {
        $data = ['my_class_id', 'section_id', 'my_parent_id', 'dorm_id', 'dorm_room_no', 'year_admitted', 'house', 'age'];

        return $remove ? array_values(array_diff($data, $remove)) : $data;
    }

    public static function decodeHash($str, $toString = true)
    {
        $date = date('dMY') . 'CJ';
        $hash = new Hashids($date, 14);
        $decoded = $hash->decode($str);
        return $toString ? implode(',', $decoded) : $decoded;
    }


    public static function getUserRole()
    {
        return Auth::user()->role;
    }

    public static function isAdmin()
    {
        return Auth::user()->role == 'admin';
    }

    public static function isEditor()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'editor' || Auth::user()->role == 'admin') {
                return true;
            }
        }
        return false;
    }

    public static function isAuthor()
    {
        if (Auth::user()->role == 'editor' || Auth::user()->role == 'admin') {
            return true;
        }
        return false;
    }

    public static function isSubscriber()
    {
        return Auth::user()->role == 'subscriber';
    }


    public static function userIsStaff()
    {
        return in_array(Auth::user()->role, self::getStaff());
    }

    public static function getStaff($remove = [])
    {
        $data =  ['super_admin', 'admin', 'teacher', 'accountant', 'librarian'];
        return $remove ? array_values(array_diff($data, $remove)) : $data;
    }

    public static function getAllUserTypes($remove = [])
    {
        $data =  ['super_admin', 'admin', 'editor', 'author', 'subscriber', 'user'];
        return $remove ? array_values(array_diff($data, $remove)) : $data;
    }

    // Check if User is Head of Super Admins (Untouchable)
    public static function headSA(int $user_id)
    {
        return $user_id === 1;
    }

    public static function getSiteOption($name)
    {
        $output = GeneralSetting::where('option_name', '=', $name)->first();
        if (empty($output)) {
            return false;
        }
        return  $output->option_value;
    }

    public static function getDefaultUserImage()
    {
        return 'uploads/default/user.png';
    }
    public static function getDefaultImage($image)
    {
        return "uploads/default/$image";
    }

    /**
     * Path for upload File .
     *
     */
    public static function getPublicUploadPath($path = '')
    {
        return 'uploads/' . $path;
    }

    /**
     * Path for upload File as role and date .
     *
     */
    public static function getUserUploadPath($role)
    {
        return 'uploads/' . $role . '/' . date('Y') . '/' . date('m') . '/' . date('d') . '/';
    }

    /**
     * Path for upload File as date .
     *
     */
    public static function getDateUploadPath()
    {
        return 'uploads/' . date('Y') . '/' . date('m') . '/' . date('d') . '/';
    }

    public static function deleteFile($file, $path)
    {
        $output =  false;
        $fileName = $path . basename($file);
        if (file_exists($fileName)) {
            $output = unlink($fileName);
        }
        return $output;
    }
    public static function getFile($file, $path)
    {

        return url('storage/' . $path . $file);
    }

    public static function getFileByID($id)
    {
        $file = File::find($id);

        return Qs::getFile($file->slug, $file->path);
    }
    public static function uploadFile($file, $path)
    {
        $fileData = [];
        $fileData['slug'] =  str_replace(' ', '_', $file->getClientOriginalName());
        $fileData['name'] = ucwords(str_replace('-', ' ', str_replace('_', ' ', pathinfo($fileData['slug'], PATHINFO_FILENAME))));
        $fileData['path'] =  $path;
        $fileData['ext'] = $file->getClientOriginalExtension();
        $fileData['uploaded_by'] =  Auth::user()->id;

        $savedFile = File::where([['path', '=', $fileData['path']], ['slug', '=', $fileData['slug']]])->first();

        if (!$savedFile) {
            $savedFile = File::create($fileData);

            $fullPath = storage_path( 'app/public/' . $path );

            //upload new file
            // Storage::disk('public')->put( $path, $fileData['slug']);
            $file->move($fullPath, $fileData['slug']);
        }

        return $savedFile;
    }


    public static function generateUserCode()
    {
        return substr(uniqid(mt_rand()), -7, 7);
    }

    public static function formatBytes($size, $precision = 2)
    {
        $base = log($size, 1024);
        $suffixes = array('B', 'KB', 'MB', 'GB', 'TB');

        return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
    }

    public static function jsonResponse($type = 'success', $custom = false)
    {
        $arr = [
            'status'    => 'success',
            'icon'      => 'success',
            'class'     => 'success',
            'title'     => 'Good Job !',
            'message'   => 'The job was completed successfully',
            'errors'    => false,
            'reload'    => true
        ];
        if ($type == 'error') {
            $arr = [
                'status'    => 'error',
                'icon'      => 'error',
                'class'     => 'danger',
                'title'     => 'Opps !',
                'message'   => 'The job was unsuccessful.',
                'errors'    => false,
                'reload'    => false
            ];
        }
        if ($type == 'deleted') {
            $arr = [
                'status'    => 'success',
                'icon'      => 'success',
                'class'     => 'success',
                'title'     => 'Good Job !',
                'message'   => 'The job was deleted successfully',
                'errors'    => false,
                'reload'    => true
            ];
        }


        if ($custom) {
            $arr = array_merge($arr, $custom);
        }

        return response()->json($arr);
    }

    public static function storeOk($routeName)
    {
        return self::goWithSuccess($routeName, __('msg.store_ok'));
    }

    public static function deleteOk($routeName)
    {
        return self::goWithSuccess($routeName, __('msg.del_ok'));
    }

    public static function updateOk($routeName)
    {
        return self::goWithSuccess($routeName, __('msg.update_ok'));
    }

    public static function goToRoute($goto, $status = 302, $headers = [], $secure = null)
    {
        $data = [];
        $to = (is_array($goto) ? $goto[0] : $goto) ?: 'dashboard';
        if (is_array($goto)) {
            array_shift($goto);
            $data = $goto;
        }
        return app('redirect')->to(route($to, $data), $status, $headers, $secure);
    }

    public static function goWithDanger($to = 'dashboard', $msg = NULL)
    {
        $msg = $msg ? $msg : __('msg.rnf');
        return self::goToRoute($to)->with('flash_danger', $msg);
    }

    public static function goWithSuccess($to, $msg)
    {
        return self::goToRoute($to)->with('flash_success', $msg);
    }

    public static function getDaysOfTheWeek()
    {
        return ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    }

    public static function validation_error($data = [])
    {
        $message = '<ul>';
        foreach ($data as $key => $values) {
            foreach ($values as $key) {
                $message .= "<li>$key</li>";
            }
        }
        $message .= '</ul>';

        return $message;
    }
}
