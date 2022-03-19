<?php

namespace App\Http\traits;

use App\Models\Category;
use App\Models\Product;
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

    function uploadMedia(Product $product, $num, $image)
    {

        $fileName = $product->name . '_' . time() . '_' . $num . '.' . $image->getClientOriginalExtension();
        $fileSize = $image->getSize();
        $fileType = $image->getMimeType();
        $path = public_path('assets/products/' . $fileName);

        Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path, 100);

        $product->media()->create([
            'image_name' => $fileName,
            'product_id'=>$product->id
        ]);

    }

    function deleteCategoryImage(Category $category)
    {
        if (File::exists('assets/categories/covers/' . $category->cover)) {
            unlink('assets/categories/covers/' . $category->cover);
        }
    }
    function deleteProductMedia(Product $product, $imageId)
    {

        $image = $product->media()->whereId($imageId)->first();

        if (File::exists('assets/products/' . $image->image_name)) {
            unlink('assets/products/'. $image->image_name);
        }
        $image->delete();
    }

}
