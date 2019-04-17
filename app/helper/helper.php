<?php

function uploadImage($request, $deleteFileWithName = '', $path='/public/images'){
    $imageName = rand(11111, 99999).'_'.$request->getClientOriginalName();
    $request->move(base_path().$path, $imageName);

    if($deleteFileWithName != ''){
        if(file_exists($deleteFileWithName)){
            \Illuminate\Support\Facades\File::delete($deleteFileWithName);
        }
    }
    return $imageName;
}

if(! function_exists('words')){
    /**
    * Limit the number of words in a string
     *
     * @param string $value
     * @param int $words
     * @param string $end
     * @rerurn string
     */
    function words($value, $words, $end){
        return \Illuminate\Support\Str::words($value, $words, $end);
    }
}