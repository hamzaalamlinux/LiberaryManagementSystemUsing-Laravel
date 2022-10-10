@extends('layouts.app')
@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                @include('layouts.pages.Errors.ValidationError')
                <form class="forms-sample" method="post" name="addusers"  action="{{@url('AddUsers')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text"  name="name" required class="form-control" id="exampleInputName1" placeholder="Enter Name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputCity1">Email</label>
                        <input type="email" name="email" required class="form-control" id="exampleInputCity1" placeholder="Enter Email">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputCity1">Password</label>
                        <input type="password" name="password" required class="form-control" id="exampleInputCity1" placeholder="Enter Password">
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Submit</button>

                </form>
            </div>
        </div>
    </div>
@endsection()
