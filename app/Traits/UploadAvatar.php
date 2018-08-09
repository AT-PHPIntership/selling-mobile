<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

trait UploadAvatar
{
    /**
     * Create a new controller instance.
     *
     * @param string $checkFile CheckFile
     * @param string $file      File
     *
     * @return void
     */
    public function uploadAvatar($checkFile, $file)
    {
        $avatarName = null;

        if ($checkFile) {
            $path = Storage::disk('public')->put('avatars', $file);
            $avatarName = basename($path);
        }

        return $avatarName;
    }
}
