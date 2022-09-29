@extends('layouts.app')
@section('content')

    <div class="table-responsive my-5">



        <table class="table my-3">
            <h2>List Orf Request</h2>
            <thead>
            <tr>
                <th><input onclick="checkAll()" type="checkbox" ></th>
                <th scope="col">BookName</th>
                <th scope="col">Authorname</th>
                <th scope="col">Last Date</th>
                <th scope="col">Message</th>
                <th scope="col">Image</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody id="details">
            @php
                $count = 1;
            @endphp
            @foreach($list as $item)
                <tr>
                    <td><input class="chx" id="{{$item->request_id}}" type="checkbox" ></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->AuthorName}}</td>
                    <td>{{$item->endate}}</td>
                    <td>{{$item->message}}</td>
                    <td><img  src="{{@$item->url}}" alt="Card image" ></td>
                    <td>{{@$item->requeststatus}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection()
