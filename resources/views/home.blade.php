@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="container alert">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{$message}}
                </div>
            @elseif($message = Session::get('failed'))
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @endif
        </div>
        @foreach ($books as $item)
            <div class="col-md-3 cards">
                <!--<div class="book-container" @if($item->status) style="background-color:#cccccc !important" @endif>-->
                <div class="book-container">

                    <img src="{{ $item->image }}" class="img-fluid" style="height: 160px " >
                    <h4 style="font-weight:bold">{{ $item->name}}</h4>
                    <p>Category : {{ $item->category }}</p>
                    <p>Price : {{ $item->price }} DNT</p>

                    <div class="row">
                        <div class="col-5">
                            <form action="{{ route('adopt', $item->id)}}" method="POST">
                                @csrf
                                <!--<button type="submit" class="btn" @if($item->status) disabled style="background-color:#5f5e5e !important" @endif>Buy</button>-->
                                <button type="submit" class="btn">Buy</button>

                            </form>

                        </div>
                        <div class="col-7">
                            <a class="btn" href="{{ route('details', $item->id)}}" class="href" >Details</a>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col col-sm-6" style="margin-top:15px">
            {!! $books->links() !!}
        </div>
    </div>

</div>
@endsection
