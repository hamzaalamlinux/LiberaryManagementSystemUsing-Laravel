<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Repository\BooksRequest\IBookRequestRepository;
use Illuminate\Http\Request;

class AddBookRequestController extends Controller
{
   private IBookRequestRepository $_repository;
    public function __construct(IBookRequestRepository $_repository)
    {
        $this->_repository = $_repository;
    }

    public  function  AddRequest(Request $request){
        try {
            $data = [
                ['bookid' => $request->input('book_id'), 'message' => $request->input('message'), 'status' => '0', 'endate' => $request->input('enddate'), 'startdate' => date('Y-m-d')]
            ];
            $this->_repository->AddBookRequest($data);
            return  redirect('/GetBooks')->with('success' ,'Your Request Successfully Inserted');
        }catch (\Exception $exception){
            return redirect('/GetBooks')->with('message' , $exception->getMessage());
        }
    }
}
