<?php

namespace App\Traits;

Trait ImageTrait
{
    function uploadImage($photo, $folder)
    {
        $file_extension = $photo->getClientOriginalExtension();
        $photo_name     = time() . '.' . $file_extension;
        $path           = 'public/'.$folder;
        $photo->move($path, $photo_name);

        return $photo_name;
    }
}