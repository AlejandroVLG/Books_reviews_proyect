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

    /////////////////////////////////////////////////////////////////////////////////
    //////////<------------------- EDIT REVIEW BY ID------------------>//////////////
    /////////////////////////////////////////////////////////////////////////////////

    public function editReviewById(Request $request, $id)
    {
        try {
            Log::info('Updating a review');

            $validator = Validator::make($request->all(), [
                'book_id' => 'integer',
                'review_title' => 'string',
                'score' => 'integer',
                'message' => 'string'
            ]);

            if ($validator->fails()) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => $validator->errors()
                    ],
                    400
                );
            }

            $userId = auth()->user()->id;

            $review = Review::query()->where('user_id', '=', $userId)->find($id);

            if (!$review) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => "Review doesn't exists"
                    ],
                    404
                );
            }

            $bookId = $request->input('book_id');
            $reviewTitle = $request->input('review_title');
            $score = $request->input('score');
            $message = $request->input('message');


            if (isset($bookId)) {
                $review->book_id = $bookId;
            };
            if (isset($synopsis)) {
                $review->review_title = $reviewTitle;
            };
            if (isset($score)) {
                $review->score = $score;
            };
            if (isset($message)) {
                $review->message = $message;
            };

            $review->save();

            return response()->json(
                [
                    'success' => true,
                    'message' => "Review " . $id . " changed"
                ],
                200
            );
        } catch (\Exception $exception) {

            Log::error("Error modifing the review: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => "Error modifing the reviewv " . $id
                ],
                500
            );
        }
    }

    /////////////////////////////////////////////////////////////////////////////////
    /////////////<------------------- DELETE REVIEW ------------------>//////////////
    /////////////////////////////////////////////////////////////////////////////////

    public function deleteReview($id)
    {
        try {
            Log::info('Deleting a review');

            $review = Review::query()->find($id);

            if (!$review) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => "Review doesn't exists"
                    ],
                    404
                );
            }

            $review->delete($id);

            return response()->json(
                [
                    'success' => true,
                    'message' => "Review " . $id . " deleted"
                ],
                200
            );
        } catch (\Exception $exception) {

            Log::error("Error deleting the review: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => "Error deleting the review"
                ],
                500
            );
        }
    }

    /////////////////////////////////////////////////////////////////////////////////
    ///////<------------------- SEARCH REVIEW BY USER ID ------------------>/////////
    /////////////////////////////////////////////////////////////////////////////////

    public function searchReviewByUserName($name)
    {
        try {

            Log::info("Getting filtered reviews by user id");

            $review = Review::query()
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
                ->where('name', '=', $name)
                ->get()
                ->toArray();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'reviews retrieved successfully',
                    'data' => $review
                ],
                200
            );
        } catch (\Exception $exception) {

            Log::error("Error getting the reviews: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => "Error getting the reviews"
                ],
                500
            );
        }
    }

    /////////////////////////////////////////////////////////////////////////////////
    ///////<------------- SHOW REVIEWS BY DESCENDENT ORDER ID ------------->/////////
    /////////////////////////////////////////////////////////////////////////////////

    public function showReviewsOrderedByScoreDesc()
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
                ->orderBy('score', 'desc')
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
    ///////<------------- SHOW REVIEWS BY ASCENDENT ORDER ID ------------->/////////
    /////////////////////////////////////////////////////////////////////////////////

    public function showReviewsOrderedByScoreAsc()
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
                ->orderBy('score', 'asc')
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
