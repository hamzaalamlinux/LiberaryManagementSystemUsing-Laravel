<?php
/** created by hamza alam */
namespace App\Repository\Books;

interface IBookRepository
{
  public  function AddBooks($request);
  public function BooksList();
  public function  PendingBookList();
  public function RequestList();

}
