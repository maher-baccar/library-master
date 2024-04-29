@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="container alert">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{$message}}
                </div>
            @endif
        </div>
        @foreach ($books as $item)
            <div class="col-md-3">
                <!--<div class="dog-container" @if($item->status) style="background-color:#c2c1c1 !important" @endif>-->
                <div class="book-container">

                    <img src="{{ $item->image }}" class="img-fluid" style="height: 160px " >
                    <h4 style="font-weight:bold">{{ $item->name}}</h4>
                    <p>Category : {{ $item->category }}</p>
                    <p>Price : {{ $item->price }}</p>

                    <div class="d-flex">
                        <div class="row">
                            <div class="col-3">
                                <form action="{{ route('books.destroy',$item->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn" type="submit"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </div>
                            <div class="col-3">
                                <form action="{{ route('books.edit',$item->id)}}" method="GET">
                                    @csrf
                                    <!--<button class="btn" type="submit" @if($item->status) disabled style="background-color:#5f5e5e !important" @endif><i class="fa-solid fa-pen-to-square"></i></button>-->
                                    <button class="btn" type="submit"><i class="fa-solid fa-pen-to-square"></i></button>

                                </form>
                            </div>
                            <div class="col-3">
                                <a class="btn" href="{{ route('details', $item->id)}}" class="href"><i class="fa-solid fa-circle-info"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
    {!! $books->links() !!}

</div>
@endsection
