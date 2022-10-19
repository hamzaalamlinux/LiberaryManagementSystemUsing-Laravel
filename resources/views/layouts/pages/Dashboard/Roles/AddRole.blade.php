@extends('layouts.app')
@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                @include('layouts.pages.Errors.ValidationError')
                <form class="forms-sample" method="post" name="addusers"  action="{{@url('AddRole')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputName1">Users</label>
                          <select name="role" class="form-control">
                              <option value=""></option>
                              @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                              @endforeach
                          </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputCity1">Roles</label>
                        <select name="user" class="form-control">

                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>

                </form>
            </div>
        </div>
    </div>
@endsection()
