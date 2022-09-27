<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Repository\BooksRequest\IBookRequestRepository;
use http\Env\Response;
use Illuminate\Http\Request;

class UpdatePendingrequestController extends Controller
{
    private  IBookRequestRepository $repository;

    public function __construct(IBookRequestRepository $repository)
    {
        $this->repository = $repository;
    }

    public function UpedateBookRequest(Request $request){
        try {
            $this->repository->UpdateBookRequest($request->input('request'));
            return json_encode(array('status' => 200 , 'message' => "successfully updated"));
        }
        catch (\Exception $exception){
            return json_encode(array('status' => 400 , 'message' => $exception->getMessage()));
        }

    }
    //
}
