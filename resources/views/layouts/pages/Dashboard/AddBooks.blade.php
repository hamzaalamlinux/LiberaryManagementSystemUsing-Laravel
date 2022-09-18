@extends('layouts.app')
@section('content')

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    
                  @include('layouts.pages.Errors.ValidationError')
                    <form class="forms-sample" method="post" name="addbooks"  enctype="multipart/form-data" action = "{{route('AddBooks')}}">
                    {{ csrf_field() }}
                      <div class="form-group">
                        <label for="exampleInputName1">Book Name</label>
                        <input type="text"  name="bookname" required class="form-control" id="exampleInputName1" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Author Name</label>
                        <input type="text" name="authorname" required class="form-control" id="exampleInputEmail3" placeholder="Enter Author Name">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleSelectGender">Book Category</label>
                        <select class="form-control" required name ="category" id="exampleSelectGender">
                          <option value = ''>Select Category</optioon>
                          <option value='1'>Science</option>
                          <option value='2'>Religion</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Book Image</label>
                        
                        <div class="input-group col-xs-12">
                        <input type="file" multiple name="img[]" required class="form-control file-upload-info" class="file-upload-default">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Date</label>
                        <input type="date" name="date" required class="form-control" id="exampleInputCity1" placeholder="Location">
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" name="description" id="exampleTextarea1" rows="4"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      
                    </form>
                  </div>
                </div>
              </div>
              @endsection()