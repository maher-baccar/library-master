<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Cart;
use Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::latest()->paginate(8);
        return view('home' , compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createBook');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        $input=request()->validate([
            'image' => 'required',
            'name' => ['required', 'string', 'max:50'],
            'caterogy' => 'required',
            'price' =>['required','integer'],
            'description' => ['string'],
        ]);
        $input['user_id'] = Auth::user()->id;
        //upload image
        $input['image'] = $request->file('image')->store('images','public');
        
        $book = Book::create($input);
        $book->ref='Ref-'.$book->id;
        
        $book->save();
        return redirect()->back()->with('success','Book added successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('book.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('editBook',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'category' =>['required'],
            'price' =>['required'],
            'description' => 'string'

        ]);
        $book ->update($request->all());
        return redirect()->back()->with('success','Your book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->back()->with('success','Book deleted successfully.');
    }


    public function addToCart($id)
    {
        $book = Book::find($id);
        $input = [
            'totalPrice' => $book->price,
            'user_id' => Auth::user()->id,
            'book_id' => $id,
        ];

        $cart = Cart ::create($input);

        return redirect()->back()->with('success','Book added to cart successfully.');
    }

    public function bookList()
    {
        $books = Book::all();

        return view('books', compact('books'));
    }


}
