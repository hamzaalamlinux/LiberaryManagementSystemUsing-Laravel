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

    public function BooksList()
    {
        $result = $this->model::select('books.id' , 'books.name' , 'category.name as categoryname' , 'url' , 'descriptions')->join('category' , 'books.category_id' , '=' , 'category.id')->join('booksimages' , 'category.id' , '=' , 'booksimages.category_id')->where('books.status' , '=' , 'true')
            ->get();
        return $result;
    }
}
