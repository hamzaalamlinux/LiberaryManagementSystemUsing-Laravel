@extends('layouts.app')
@section('content')

    <div class="table-responsive my-5">
        <div>
            <h3 class="mx-4">Pending Request</h3>
        </div>
        <table class="table">
            <caption>List of users</caption>
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Last Date</th>
                <th scope="col">Message</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @php
              $count = 0;
            @endphp
            @foreach($list as $item)
                <tr>
                    <td>{{$count++}}</td>
                    <td>{{$item->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection()
