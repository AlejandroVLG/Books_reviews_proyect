<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
        /////////////////////////////////////////////////////////////////////////////////
    /////////<------------------- CREATE A NEW GAME ------------------>//////////////
    /////////////////////////////////////////////////////////////////////////////////

    public function createBook(Request $request)
    {
        try {
            Log::info("Creating a book");

            $validator = Validator::make($request->all(), [
                'title' => ['required', 'string'],
                'synopsis' => ['required', 'string'],
                'series' => ['required', 'string'],
                'author' => ['required', 'string'],
                'genre' => ['required', 'string'],
                'year' => ['required', 'string'],
                'book_cover' => ['required', 'string'],
                'author_wiki_url' => ['required', 'string'],
                'shop_url' => ['required', 'string']
            ]);

            if ($validator->fails()) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => $validator->errors()
                    ],
                    400
                );
            };

            $userId = auth()->user()->id;

            $title = $request->input('title');
            $synopsis = $request->input('synopsis');
            $series = $request->input('series');
            $author = $request->input('author');
            $genre = $request->input('genre');
            $year = $request->input('year');
            $bookCover = $request->input('book_cover');
            $authorWikiUrl = $request->input('author_wiki_url');
            $shopUrl = $request->input('shop_url');

            $book = new Book();

            $book->user_id = $userId;
            $book->title = $title;
            $book->synopsis = $synopsis;
            $book->series = $series;
            $book->author = $author;
            $book->genre = $genre;
            $book->year = $year;
            $book->book_cover = $bookCover;
            $book->author_wiki_url = $authorWikiUrl;
            $book->shop_url = $shopUrl;

            $book->save();


            return response()->json(
                [
                    'success' => true,
                    'message' => "book " . $title . " created"
                ],
                200
            );
        } catch (\Exception $exception) {
            Log::error("Error creating " . $title . ", " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => "Error creating the book " . $title
                ],
                500
            );
        }
    }
}
