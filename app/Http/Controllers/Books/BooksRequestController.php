<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Repository\Books\IBookRepository;
use Illuminate\Http\Request;

class BooksRequestController extends Controller
{  private  IBookRepository $repository;

    public function __construct(IBookRepository $repository , )
    {

        $this->repository = $repository;

    }
    public function GetBooksRequest(){
        $list = $this->repository->RequestList();
        return view('layouts.pages.Dashboard.Books.BooksRequest')->with('list' , $list);
    }
}
