<?php 

namespace App\Helpers;
use Storage;

class Handler{

    public static function uploadFile($images, $directory){
        $extension = $images->extension();
        $pathFile = 'public/storage/'. $directory . '/' . time() . '.' . $extension;
        $file = $images->move('storage/'.$directory, $pathFile);
        return str_replace('\\','/',$file);
    }

    public static function deleteFile($images){
        if(file_exists($images))
            return unlink($images);
        return false;
    }
}

?>