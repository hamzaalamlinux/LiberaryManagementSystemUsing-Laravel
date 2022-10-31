@extends('layouts.app')
@section('content')

    <div class="table-responsive my-5">

        <table class="table my-3">
            <h2>Panelty</h2>
            <thead>
            <tr>
                <th scope="col">Sno</th>
                <th scope="col">Paneltie</th>
                <th scope="col">Update</th>
            </tr>
            </thead>
            <tbody id="Paneltiesdetails">
            @php
                $count = 1;
            @endphp
            @foreach($list as $item)
                <tr>
                    <td >{{$count++}}</td>
                    <td contenteditable="true"  onKeyPress="return isNumber(event)">{{$item->amount}}</td>
                    <td><a href="javascript:void(0)" onclick="EditPanelties()" class="nav-link text-white"><i class="fa fa-edit"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection()
