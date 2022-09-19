<?php
/** created by hamza alam */
namespace App\Repository\Books;
use App\Models\books;
class EloquestBooks implements IBookRepository
{
    private  books $model;
    public function __construct(books $model)
    {
        $this->model = $model;
    }

    public function AddBooks($request)
    {
        $this->model::insert($request);
        $response = $this->model::latest('id')->first();
        return $response->id;
    }
}
