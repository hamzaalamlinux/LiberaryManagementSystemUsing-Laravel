<?php

namespace App\Repository\BooksRequest;

use App\Models\BookRequest;

class BooksRequestEloquent implements IBookRequestRepository
{
    private BookRequest $_model;

    /**
     * @param BookRequest $_model
     */
    public function __construct(BookRequest $_model)
    {
        $this->_model = $_model;
    }

    public function AddBookRequest($request)
    {
        return $this->_model->insert($request);
    }

    public function UpdateBookRequest($request){
        $result = $this->_model->whereIn('id' , $request)->update(['status' => '1']);
        return $result;
    }
}
