<?php
/** created by hamza alam */
namespace App\Repository\Books;
use App\Models\books;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $result = $this->model::select('books.id' , 'books.name' , 'url' , 'category.name as categoryname' , 'descriptions' , 'booksrequest.status')->join('booksimages' , 'books.id' , '=' , 'booksimages.book_id')->leftjoin('booksrequest' , 'books.id' , '=' , 'booksrequest.bookid')->join('category' , 'books.category_id' , '=' , 'category.id')->where('books.status' , '=' , 'true')->where('booksrequest.status' , '=' , null);
        return $result->get();
    }


    public  function PendingBookList(){
        $result = $this->model::select('books.id' , 'books.name' , 'url' , 'category.name as categoryname' , 'descriptions' , 'booksrequest.status' , 'booksrequest.id as request_id' ,'booksrequest.message' , 'books.AuthorName' , 'booksrequest.endate')->join('booksimages' , 'books.id' , '=' , 'booksimages.book_id')->leftjoin('booksrequest' , 'books.id' , '=' , 'booksrequest.bookid')->join('category' , 'books.category_id' , '=' , 'category.id')->where('books.status' , '=' , 'true');
        $result = $this->model->scopePendingRequest($result);
        return $result->get();
    }

    public function RequestList()
    {
        $result = $this->model::select('books.id' , 'books.name' , 'url' , DB::raw('(case when booksrequest.status = 1 then "Approve" when booksrequest.status = 0 then "Pending" else "Expire" end) as requeststatus '), 'category.name as categoryname' , 'descriptions' ,'booksrequest.message' ,  'booksrequest.status' , 'books.AuthorName', 'booksrequest.endate')->join('booksimages' , 'books.id' , '=' , 'booksimages.book_id')->leftjoin('booksrequest' , 'books.id' , '=' , 'booksrequest.bookid')->join('category' , 'books.category_id' , '=' , 'category.id')->where('books.status' , '=' , 'true');
        $result = $this->model->UserWiseRequest($result , Auth::id());
        return $result->get();
    }
}
