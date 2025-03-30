<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait ImageUpload
{
    public function uploadImage($path, $image): string
    {
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path($path), $imageName);

        return $imageName;
    }

    public function deleteImage($path): void
    {
        File::delete(public_path($path));
    }
}
