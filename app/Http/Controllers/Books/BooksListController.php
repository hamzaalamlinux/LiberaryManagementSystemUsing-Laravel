<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Repository\Books\IBookRepository;
use App\Repository\BooksImages\IBookImagesRepository;
use Illuminate\Http\Request;

class BooksListController extends Controller
{
    private  IBookRepository $repository;

    public function __construct(IBookRepository $repository , )
    {

        $this->repository = $repository;

    }
    public  function GetBooks(){
        $list = $this->repository->BooksList();
        if(!$list){
            return  redirect('layouts.pages.Dashboard.Books.BooksList')->with('message' , 'Sorry No Data Found');
        }
        return view('layouts.pages.Dashboard.Books.BooksList')->with('list' , $list);
    }
    //
}
