<?php

namespace Republicas\Traits;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

trait FileUploadTrait
{
    public function uploadImage(UploadedFile $image, $path)
    {
        $real_path = file_get_contents($image->getRealPath());
        $extension = $image->getClientOriginalExtension();

        Storage::put($path.$image->getFilename().'.'.$extension, $real_path);

        $db_path = $path.$image->getFilename().'.'.$extension;

        return $db_path;
    }
}