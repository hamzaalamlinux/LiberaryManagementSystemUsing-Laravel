@extends('layouts.app')
@section('content')

    <div class="table-responsive my-5">



        <table class="table my-3">
            <h2>List Orf Users</h2>
            <thead>
            <tr>
                <th scope="col">Sno</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Creation Date</th>
                <th scope="col">Action</th>

            </tr>
            </thead>
            <tbody id="details">
            @php
                $count = 1;
            @endphp
            @foreach($list as $item)
                <tr>
                        <td>{{$count++}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>Action</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection()
