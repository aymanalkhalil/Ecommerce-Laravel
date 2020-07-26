<?php

namespace App\Traits;

trait ImageTrait
{
    // Save Category Images
    function saveImage($image, $folder)
    {
        $file_extenstion = $image->getClientOriginalExtension();
        $filename = "category-image" . "-" . time() . "."  . $file_extenstion;
        $path = $folder;
        $image->move($path, $filename);
        return $filename;
    }
    function saveProductImage($image, $folder)
    {
        $file_extenstion = $image->getClientOriginalExtension();
        $filename = "product-image" . "-" . time() . "."  . $file_extenstion;
        $path = $folder;
        $image->move($path, $filename);
        return $filename;
    }

    // Check old Image And delete it to get the new one
    function checkOld($path, $db_row)
    {
        $old_image = public_path($path . $db_row);
        if (file_exists($old_image)) {
            unlink($old_image);
        } else {
            return false;
        }
    }
}
