<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Repository\Books\IBookRepository;
use Illuminate\Http\Request;

class PendingBooksController extends Controller
{
    //
    private  IBookRepository $repository;

    public function __construct(IBookRepository $repository)
    {

        $this->repository = $repository;

    }


    public  function GetBooksPendingRequest(){
        $list = $this->repository->PendingBookList();
        if(!$list){
            return  redirect('layouts.pages.Dashboard.Books.PendingBookRequest')->with('message' , 'Sorry No Data Found');
        }
        return view('layouts.pages.Dashboard.Books.PendingBookRequest')->with('list' , $list);
    }
}
