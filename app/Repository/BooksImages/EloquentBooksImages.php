<?php
/** created by hamza Alam */
namespace App\Repository\BooksImages;

use App\Models\book_images;

class EloquentBooksImages implements IBookImagesRepository
{
    private  book_images $model;

    /**
     * @param book_images $model
     */
    public function __construct(book_images $model)
    {
        $this->model = $model;
    }

    public function AddBooksImages($request)
    {
        $this->model->insert($request);
    }
}
