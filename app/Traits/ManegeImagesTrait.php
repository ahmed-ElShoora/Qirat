<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait ManegeImagesTrait
{
    public function uploadImage($image, $folder = 'general')
    {
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

        $path = $image->storeAs(
            "images/$folder",
            $imageName,
            'public'
        );

        return $path;
    }

    public function deleteImage($path)
    {
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}