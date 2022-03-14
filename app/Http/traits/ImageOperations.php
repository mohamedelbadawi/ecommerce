<?php

namespace App\Http\traits;

use App\Models\Category;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
trait ImageOperations
{

    function uploadImage($image, $path, $size, $name)
    {
        $filename = $name . '_' . time() . '_' . '.' . $image->getClientOriginalExtension();
        $path = public_path($path . $filename);
        Image::make($image->getRealPath())->resize($size, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path, 100);

        return $filename;
    }

    function deleteCategoryImage(Category $category)
    {
        if (File::exists('assets/categories/covers/' . $category->cover)) {
            unlink('assets/categories/covers/' . $category->cover);
        }
    }

}
