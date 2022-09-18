<?php
/** Created By Hamza Alam */
namespace  App\Helpers;
class Upload{

    public static function UplaodFile($files){
        
        foreach($files as $file){
            $path = $file->store('photos');
            $array[] = array(
                'path' => $path
            );
        }
         return $array;   
    }
}

?>