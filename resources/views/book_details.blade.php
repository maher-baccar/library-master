@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container alert">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{$message}}
                        </div>
                    @endif
                </div>
                <div class="card">

                    <div class="card-body">
                        <img src="{{$book->image}}" class="img-fluid" style="height: 30%; width:30% ; margin:10px">
                        <div class="container">

                                <div class="row">
                                    <div class="col-4 col-md-3">Name </div>
                                    <div class="col-8 col-md-9"><p>{{$book->name}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-4 col-md-3"> Category </div>
                                    <div class="col-8 col-md-9"><p>{{$book->category}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-4 col-md-3">Price</div>
                                    <div class="col-8 col-md-9"><p>{{$book->price}} DNT</div>
                                </div>

                                <div class="row">
                                    <div class="col-4 col-md-3">Description</div>
                                    <div class="col-8 col-md-9"><p>{{$book->description}}</div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

