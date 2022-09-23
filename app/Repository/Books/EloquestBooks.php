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
        $result = $this->model::select('books.id' , 'books.name' , 'url' , 'category.name as categoryname' , 'descriptions' , 'booksrequest.status')->join('booksimages' , 'books.id' , '=' , 'booksimages.book_id')->leftjoin('booksrequest' , 'books.id' , '=' , 'booksrequest.bookid')->join('category' , 'books.category_id' , '=' , 'category.id')->where('books.status' , '=' , 'true');
        return $result->get();
    }


    public  function PendingBookList(){
        $result = $this->model::select('books.id' , 'books.name' , 'url' , 'category.name as categoryname' , 'descriptions' , 'booksrequest.status')->join('booksimages' , 'books.id' , '=' , 'booksimages.book_id')->leftjoin('booksrequest' , 'books.id' , '=' , 'booksrequest.bookid')->join('category' , 'books.category_id' , '=' , 'category.id')->where('books.status' , '=' , 'true');
        $result = $this->model->scopePendingRequest($result);
        return $result->get();
    }
}
