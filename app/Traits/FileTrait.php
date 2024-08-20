<?php

namespace App\Traits;

use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

trait FileTrait
{

    public function uploadFile($file, $path, $disk='local')
    {
        $fileData = [];
        $fileData['slug'] = File::filterSlug( $file->getClientOriginalName());
        $fileData['name'] = File::filterName( pathinfo($fileData['slug'], PATHINFO_FILENAME));
        $fileData['path'] =  $path;
        $fileData['ext'] = $file->getClientOriginalExtension();
        $fileData['disk'] = $disk;
        $fileData['size'] = filesize($file);
        $fileData['uploaded_by'] =  Auth::user()->id;

        $savedFile = File::where([
            ['path', '=', $fileData['path']],
            ['slug', '=', $fileData['slug']],
            ['disk', '=', $fileData['disk']]
        ])->first();


        if ( ! $savedFile) {
            $savedFile = File::create($fileData);
        }

        $fullPath = $savedFile->path . $savedFile->slug ;

        $getFile = Storage::disk($disk)->exists($fullPath);

        if(!$getFile){
            //upload new file
            Storage::disk($disk)->put($fullPath, file_get_contents($file));
        }

        return $savedFile;
    }
}
