@extends('layouts.app')
@section('content')
   <div class="row my-5">
       @foreach($list as $item)
           <div class="col-md-4">
                <div class="card" style="width:400px">
                    <img class="card-img-top" src="{{@$item->url}}" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">{{@$item->name}}</h4>
                        <p class="card-text">{{@$item->descriptions}}</p>
                        <button type="button" class="btn btn-success" id="{{@$item->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
               <div class="modal-body">
                   <form>
                       <div class="form-group">
                           <label class="col-form-label">Select Submit Date</label>
                           <input type="date" id="date" class="form-control" >
                       </div>
                       <div class="form-group ">
                           <label class="col-form-label">Message</label>
                           <textarea class="form-controls col-12" cols="4" rows="4" resize="none" autofocus>

                           </textarea>
                       </div>
                   </form>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                   <button type="button" class="btn btn-primary">Save changes</button>
               </div>
           </div>
       </div>
   </div>
    <!-- End Modal-->
@endsection()
