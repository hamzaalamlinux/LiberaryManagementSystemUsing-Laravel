<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Repository\Books\IBookRepository;
use App\Repository\BooksImages\IBookImagesRepository;
use Illuminate\Http\Request;
use App\Http\Requests\AddBookRequest;
use App\Helpers\Upload;

class AddBooksController extends Controller
{
    //
    private  IBookRepository $repository;
    private  IBookImagesRepository $imagesRepository;
    public function __construct(IBookRepository $repository , IBookImagesRepository $imagesRepository)
    {

       $this->repository = $repository;
       $this->imagesRepository = $imagesRepository;
    }

    public function AddBooks(AddBookRequest $request){
        $request->validated();
        $data = [
            ['name' => $request->input('bookname') ,  'AuthorName' => $request->input('authorname')  , 'category_id' => $request->input('category') , 'descriptions' => $request->input('description') , 'date' => date('Y-m-d') , 'status' => 'true']
        ];
        $id = $this->repository->AddBooks($data);
        $files = $request->file('img');
        $response = Upload::UplaodFile($files);
        foreach($response as $item){
           $data = [
               ['url' => $item['path'] , 'category_id' => $request->input('category') , 'book_id' => $id]
           ];
        }
        $this->imagesRepository->AddBooksImages($data);

    }
}
