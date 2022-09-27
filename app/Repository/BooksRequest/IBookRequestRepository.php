<?php

namespace App\Repository\BooksRequest;

interface IBookRequestRepository
{
  public  function AddBookRequest($request);
  public function UpdateBookRequest($request);
}
