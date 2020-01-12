@extends('layouts.app')

@section('content')
    <style>
        .container{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .col-md-8{
            flex: 1;
        }

    </style>
    <div class="container">
        <div class="col-md-8">
                <div class="panel-body">
                    <br>
                    <h3>Your offers</h3>
                    <br>
                    <a href="/offers/create" class="btn btn-primary">Add new offer +</a>
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Salary</th>
                            <th>Deadline</th>
                            <th></th>
                        </tr>
                        @foreach( $offers as $offer )
                            <tr>
                                <th> <a href="{{ route('offers.show', $offer) }}">{{$offer->title}}</a></th>
                                <th>{{$offer->description}}</th>
                                <th>{{$offer->maxSalary}}</th>
                                <th>{{$offer->deadline}}</th>
                                <th><a href="{{ route('offers.edit', $offer) }}" class="btn btn-default">Edit</a><br>
                                <a href="{{ route('offers.destroy', $offer) }}" class="btn btn-default">Delete</a></th>
                            </tr>
                        @endforeach
                    </table>
                </div>


            </div>
        <div class="col-md-8">
            <div class="panel-body"><br>
                <h3>Assigned offers</h3>
                <br>
                <p>No table prepared yet</p>
            </div>
        </div>
    </div>
@endsection
