<?php

namespace App\Http\Controllers;

#use App\Models\AdoptionRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
#use App\Http\Controllers\AdoptionRequestController;

class UserController extends Controller
{


    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function dashboard()
    {
        $users = User::all();

        $books = book::all();
        /*$adoptionRequests = AdoptionRequest::all();
        $label = ['Number of dogs', 'Adoption requests' ,'Adopted dogs', 'Not adopted dogs', 'Pending dogs'];
        $number = [
            dog::count(),
            AdoptionRequest::count(),
            dog::where('status', '=', 1)->count(),
            dog::where('status', '=', 0)->count(),
            AdoptionRequest::count()-AdoptionRequest::where('status', '=', 1)->count(),
        ];*/
        return view('dashboard.dashboard', compact('users', 'books', 'adoptionRequests','label','number'));
    }


    public function  users(){
        $users=User::orderBy('created_at','desc')->paginate(10);
        return view('dashboard.users',compact('users'));
    }

    public function all_books(){
        $dogs=book::orderBy('created_at','desc')->paginate(10);
        return view('dashboard.books',compact('books'));
    }

    /*public  function adoptRequests(){
        $requests = DB::table('dogs as dog')
            ->join('adoption_requests as requests', 'dog.id', '=', 'requests.dog_id')
            ->join('users as user', 'user.id', '=', 'requests.user_id')
            ->select('dog.name as dog_name', 'requests.status', 'user.name as sender_name', 'requests.id', 'requests.created_at')
            ->orderBy('created_at','desc')
            ->paginate(10);
        return view('dashboard.adoption_requests',compact('requests'));
    }*/

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'phone' => ['required'],
            'email' => ['required', 'max:40'],

        ]);
        $user = Auth::user();
        $user->update($request->all());
        $user->save();

        return redirect()->back()->with('success', 'Your data updated successfully.');
    }

    public function destroy($id)
    {
        //
    }

    public function profile()
    {
        $user = Auth::user();
        if (Auth::user()) {
            return view('profile', compact('user'));
        }

        /*$user = Auth::user();
        if((Auth::user()->role=='client')){
            return view('profileUser',compact('user'));
        }
        else
        if(Auth::user()->role=='auteur'){
            return view('profileAuteur',compact('user'));
        }*/
    }

    public function myBooks()
    {
        /*$books = Book::where('user_id', '=', Auth::user()->id)->latest()->simplePaginate(4);
        if (Auth::user()) {
            return view('myBooks', compact('books'));
        }*/

        $books = Book::where('user_id','=',Auth::user()->id)->latest()->paginate(12);
        if((Auth::user()->role=='client')){
            return view('myBooks',compact('books'));
        }
        if((Auth::user())->role=='auteur'){
            return view('create');
        }
    }
}

