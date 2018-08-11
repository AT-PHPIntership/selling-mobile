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
     * @param string $user      User
     *
     * @return void
     */
    public function uploadAvatar($checkFile, $file, $user = null)
    {
        $avatarName = is_null($user) ? null : $user->getOriginal('avatar');

        if ($checkFile) {
            if (isset($user)) {
                if (Storage::disk('public')->exists('avatars', $user->avatar) && $user->getOriginal('avatar')) {
                    Storage::disk('public')->delete($user->avatar);
                }
            }
            $path = Storage::disk('public')->put('avatars', $file);
            $avatarName = basename($path);
        }

        return $avatarName;
    }
}
