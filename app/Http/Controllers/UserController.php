<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{   
    const ROLE_ADMIN = 2;
    
    public function getUsers()
    {
        try {

            Log::info('Retrieving all users');

            $users = User::all();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Users retrieved successfully',
                    'data' => $users
                ]
            );
        } catch (Exception $exception) {

            Log::error("Error retrieveing users" . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => "Error retrieveing users"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
    public function showProfile()
    {
        try {
            Log::info('Showing my profile');

            return response()->json(auth()->user());;
        } catch (Exception $exception) {

            Log::error("Error showing my profile" . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => "Error showing my profile"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    /////////////////////////////////////////////////////////////////////////////////
    ////////////<------------------- ADD ADMIN ROLE ----------------->///////////////
    /////////////////////////////////////////////////////////////////////////////////

    public function addAdminRoleToUser($id)
    {
        try {

            $user = User::find($id);

            $user->roles()->attach(self::ROLE_ADMIN);

            return response()->json(
                [
                    'success' => true,
                    'message' => "Admin role added"
                ],
                200
            );
        } catch (\Exception $exception) {

            Log::error("Error updating Admin role: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => "Error adding Admin role"
                ],
                500
            );
        }
    }

    /////////////////////////////////////////////////////////////////////////////////
    ////////////<----------------- REMOVE ADMIN ROLE ---------------->///////////////
    /////////////////////////////////////////////////////////////////////////////////

    public function removeAdminRoleToUser($id)
    {
        try {

            $user = User::find($id);

            $user->roles()->detach(self::ROLE_ADMIN);

            return response()->json(
                [
                    'success' => true,
                    'message' => "Admin role removed"
                ],
                200
            );
        } catch (\Exception $exception) {

            Log::error("Error removing Admin role: " . $exception->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => "Admin role removed"
                ],
                500
            );
        }
    }
}
