<?php
/** created by hamza alam */
namespace App\Repository\Panelty;

use App\Models\BookRequest;
use App\Models\books;
use App\Models\panelty;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EloquentPanelty implements IPaneltyRepository
{
    private  panelty $model;
    public function __construct(panelty $model)
    {
        $this->model = $model;
    }

    public function Panelties()
    {
        $result = $this->model::select('books.id' , 'books.name' , 'url' , DB::raw('(CASE WHEN DATEDIFF(CURRENT_DATE,booksrequest.endate) < 1 THEN 0 ELSE DATEDIFF(CURRENT_DATE,booksrequest.endate) * panelty.amount END)  as panelty'), 'category.name as categoryname' , 'descriptions' ,'booksrequest.message' ,  'booksrequest.status' , 'books.AuthorName', 'booksrequest.endate')->join('booksimages' , 'books.id' , '=' , 'booksimages.book_id')->leftjoin('booksrequest' , 'books.id' , '=' , 'booksrequest.bookid')->join('category' , 'books.category_id' , '=' , 'category.id')->join('panelty' , 'books.paneltyid' , '=' , 'panelty.id')->where('books.status' , '=' , 'true');
        $result = $this->model->UserWiseRequest($result , Auth::id());
        $result = $this->model->scopePanelty($result);
        return $result->get();
    }

    public function GetPanelties()
    {
        $result = $this->model::all()->where('status' , '=' , '1');
        return $result;
    }


    public function Update($amount)
    {
        $result =  DB::table('panelty')->update(['amount' => $amount]);
        return $result;
    }
}
