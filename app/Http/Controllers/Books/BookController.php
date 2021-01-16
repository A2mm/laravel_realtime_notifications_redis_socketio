<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use App\Events\BookViewed;
use App\Events\BookEdit;
use Illuminate\Support\Facades\Redis;

class BookController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
     public function index(Request $request) 
     {
     	$books = Book::all();
        return view('books.index', compact("books"));
    }

     public function getIndex()
    {
        $books = Book::all();
        return view('items.index')->with('books', $books);
    }

     public function getDetails($id)
    {
        $book = Book::find($id);
        if(Auth::check()) 
        {
            event(new BookEdit($book)); // fire the event
        }
        return view('items.show', compact("book"));
    }

    public function create() 
    {
        return view('books.create');
    }

    public function save(Request $request) 
    {
       // return $request->all();

        $request->validate([
            "title"         =>  "required",
            "description"    =>  "required",
          //  "image"       =>  "required|mimes:jpeg,png,jpg,bmp|max:2048"
        ]);

                $dataArray  =  array (
                	'user_id'      => Auth::user()->id,
                    "title"        => $request->title,
                    "description"  => $request->description,
                );

                $book = Book::create($dataArray);

                if(!is_null($book)) 
                {
                    return redirect()->route('books.all')->with("success", "Book details saved successfully");
                }
    }

     public function edit($id) 
    {
    	$book = Book::findOrFail($id);
         if(Auth::check()) 
        {
            event(new BookEdit($book)); // fire the event
        }
        $i = 0;
        return view('books.edit', compact('book', 'i'));
    }

    public function update(Request $request) 
    {
       $book = Book::findOrFail($request->id);

        $request->validate([
            "title"         =>  "required",
            "description"    =>  "required",
          //  "image"       =>  "required|mimes:jpeg,png,jpg,bmp|max:2048"
        ]);

                $dataArray  =  array (
                	'user_id'      => Auth::user()->id,
                    "title"        => $request->title,
                    "description"  => $request->description,
                );

                if($book->update($dataArray)) 
                {
                 return redirect()->route('books.all')->with("success", "Book details updated successfully");
                }
    }

    public function delete($id) 
    {
       $book = Book::findOrFail($id);
        if($book->delete()) 
        {
         return redirect()->route('books.all')->with("success", "Book deleted successfully");
        }
    }
}
