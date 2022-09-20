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
                        <a href="#" class="btn btn-primary">Add Request</a>
                    </div>
                </div>
           </div>
       @endforeach

   </div>

@endsection()
