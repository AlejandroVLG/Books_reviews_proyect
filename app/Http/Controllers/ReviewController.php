<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
                ->join('Users', 'Reviews.user_id', '=', 'Users.id', )
                ->join('Books', 'Reviews.book_id', '=', 'Books.id')
                ->select(
                    'Reviews.id',
                    'Users.name',
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
}
