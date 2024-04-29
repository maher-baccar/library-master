@extends('layouts.app')

@section('content')

<div class="container">
    <div class="container" style="padding-top: 2%">
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{$message}}
            </div>
        @endif
    </div>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Ref</th>
                <th scope="col">Book image</th>
                <th scope="col">Book title</th>
                <th scope="col">Book price</th>
                <th scope="col">Subtotal</th>
                <th scope="col">Remove</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartItems as $item)
                <tr >
                    <th scope="row">{{ $item->book->ref }}</th>
                    <td><img src="{{ $item->book->image }}" style="height:60px ; weight:60px"></td>
                    <td>{{ $item->book->name }}</td>
                    <td>{{ $item->book->price }} TND  </td>

                    <!--<td>
                        <form action="{{ route('carts.update',$item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="number" min="1" name="qte" value="{{ $item->qte }}" style="width:40px" />
                            <button type="submit" class="book-btn" ><i class="fa-solid fa-rotate"></i></button>
                        </form>
                    </td>-->
                    <td>{{ $item->totalPrice }} TND</td>
                    <td>
                        <form action="{{ route('carts.destroy',$item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="book-btn"><i class="fa-solid fa-x"></i></button>
                        </form>
                    </td>
                </tr>

            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan=2>
                    <p>Total price</p>
                </th>
                <td >
                    <h4>
                        {{ $total}} TND
                    </h4>
                </td>
                <td>
                    <form action="#" method="">
                        @csrf
                        <button class="book-btn">Order</button>
                    </form>
                </td>
            </tr>
        </tfoot>
    </table>
    {!! $cartItems->links() !!}
</div>

@endsection
