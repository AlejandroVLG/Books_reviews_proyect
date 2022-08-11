<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    /////////////////////////////////////////////////////////////////////////////////
    ///////////<------------------- SHOW ALL REVIEWS ------------------>/////////////
    /////////////////////////////////////////////////////////////////////////////////

    public function showAllReviews()
    {
        try {
            Log::info("Getting all reviews");

            $reviews = Review::query()
                ->join('Users', 'Reviews.user_id', '=', 'Users.id',)
                ->join('Books', 'Reviews.book_id', '=', 'Books.id')
                ->select(
                    'Reviews.id',
                    'Users.name',
                    'Books.title',
                    'Reviews.review_title',
                    'Reviews.score',
                    'Reviews.message'
                )
                ->get()
                ->toArray();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'reviews retrieved successfully',
                    'data' => $reviews
                ],
                200
            );
        } catch (\Exception $exception) {

            Log::error("Error getting reviews: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => "Error getting reviews"
                ],
                500
            );
        }
    }

    /////////////////////////////////////////////////////////////////////////////////
    ////////<------------------- CREATE A NEW REVIEW ------------------>/////////////
    /////////////////////////////////////////////////////////////////////////////////

    public function createReview(Request $request)
    {
        try {
            Log::info("Creating a review");

            $validator = Validator::make($request->all(), [

                'book_id' => ['required', 'integer'],
                'review_title' => ['required', 'string'],
                'score' => ['required', 'integer', 'min:1', 'max:10'],
                'message' => ['required', 'string']
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

            $bookId = $request->input('book_id');
            $reviewTitle = $request->input('review_title');
            $score = $request->input('score');
            $message = $request->input('message');


            $review = new Review();

            $review->user_id = $userId;
            $review->book_id = $bookId;
            $review->review_title = $reviewTitle;
            $review->score = $score;
            $review->message = $message;

            $review->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => "review " . $reviewTitle . " created"
                ],
                200
            );
        } catch (\Exception $exception) {
            Log::error("Error creating " . $reviewTitle . ", " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => "Error creating the review " . $reviewTitle
                ],
                500
            );
        }
    }
}
