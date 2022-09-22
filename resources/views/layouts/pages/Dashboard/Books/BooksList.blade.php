@extends('layouts.app')
@section('content')
   <div class="row my-5">
       @include('layouts.pages.Errors.ValidationError')
       @foreach($list as $item)
           <div class="col-md-4">
                <div class="card" style="width:400px">
                    <img class="card-img-top" src="{{@$item->url}}" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">{{@$item->name}}</h4>
                        <p class="card-text">{{@$item->descriptions}}</p>
                        <button type="button" onclick="add_request(this)" class="btn btn-success" id="{{@$item->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Request
                        </button>
                    </div>
                </div>
           </div>
       @endforeach
   </div>


<!-- Add Request Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Add Request</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form name="addbook_request"  action = "{{route('AddRequest')}}" method="post">
                   {{csrf_field()}}
               <div class="modal-body">
                        <input name="book_id" type="hidden" id="book_id">
                       <div class="form-group">
                           <label class="col-form-label">Select Submit Date</label>
                           <input type="date" name="enddate" id="endate" required class="form-control" >
                       </div>
                       <div class="form-group ">
                           <label class="col-form-label">Message</label>
                           <textarea name="message" id="message" class="form-controls col-12" class="required" cols="4" rows="4" resize="none" autofocus>

                           </textarea>
                       </div>

               </div>
               <div class="modal-footer">

                   <button type="submit"  class="btn btn-primary">Save changes</button>
               </div>
               </form>
           </div>
       </div>
   </div>
    <!-- End Modal-->
@endsection()
