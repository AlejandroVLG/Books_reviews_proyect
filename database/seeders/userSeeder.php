<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert(
            [
                'name' => 'Alejandro',
                'last_name' => 'Test Testino',
                'nick_name' => 'Alex',
                'email' => 'Alejandro@gmail.com',
                'password' => '123456',
                'gender' => 'male',
                'age' => '36',
                'country' => 'Spain',
                'favourite_author' => 'Brandon Sanderson',
                'favourite_genre' => 'Fantasy',
                'currently_reading' => 'El archivo de las tormentas',
                'facebook_account' => 'Alejandro@facebook.com',
                'twitter_account' => 'Alejandro@twitter.com',
                'instagram_account' => 'Alejandro@instagram.com'
            ]
        );
        DB::table('users')->insert(
            [
                'name' => 'Jose',
                'last_name' => 'Test Testino',
                'nick_name' => 'Joselito',
                'email' => 'jose@gmail.com',
                'password' => '123456',
                'gender' => 'male',
                'age' => '31',
                'country' => 'Spain',
                'favourite_author' => 'Stephen King',
                'favourite_genre' => 'Terror',
                'currently_reading' => 'It',
                'facebook_account' => 'Jose@facebook.com',
                'twitter_account' => 'Jose@twitter.com',
                'instagram_account' => 'Jose@instagram.com'
            ]
        );
        DB::table('users')->insert(
            [
                'name' => 'Maria',
                'last_name' => 'Test Testino',
                'nick_name' => 'Mari',
                'email' => 'Maria@gmail.com',
                'password' => '123456',
                'gender' => 'female',
                'age' => '32',
                'country' => 'Spain',
                'favourite_author' => 'Trudi Canavan',
                'favourite_genre' => 'Comedy',
                'currently_reading' => 'Trifulca a la vista',
                'facebook_account' => 'Maria@facebook.com',
                'twitter_account' => 'Maria@twitter.com',
                'instagram_account' => 'Maria@instagram.com'
            ]
        );
        DB::table('users')->insert(
            [
                'name' => 'Paco',
                'last_name' => 'Test Testino',
                'nick_name' => 'Paquito',
                'email' => 'Paco@gmail.com',
                'password' => '123456',
                'gender' => 'male',
                'age' => '36',
                'country' => 'Spain',
                'favourite_author' => 'John Grisham',
                'favourite_genre' => 'Thriller',
                'currently_reading' => 'El ocho',
                'facebook_account' => 'Paco@facebook.com',
                'twitter_account' => 'Paco@twitter.com',
                'instagram_account' => 'Paco@instagram.com'
            ]
        );
        DB::table('users')->insert(
            [
                'name' => 'Sara',
                'last_name' => 'Test Testino',
                'nick_name' => 'Sarita',
                'email' => 'Sara@gmail.com',
                'password' => '123456',
                'gender' => 'male',
                'age' => '36',
                'country' => 'Spain',
                'favourite_author' => 'J.R.R. Tolkien',
                'favourite_genre' => 'Fantasy',
                'currently_reading' => 'Elantris',
                'facebook_account' => 'Sara@facebook.com',
                'twitter_account' => 'Sara@twitter.com',
                'instagram_account' => 'Sara@instagram.com'
            ]
        );
    }
}
