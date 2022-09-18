<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddBookRequest;
use App\Helpers\Upload;

class AddBooksController extends Controller
{
    //
    public function AddBooks(AddBookRequest $request){
        $request->validated();
        $files = $request->file('img');
        $response = Upload::UplaodFile($files);
        foreach($response as $item){
            echo $item['path'];
        }
        
    }
}
