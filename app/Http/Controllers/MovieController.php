<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\MovieResource;
class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
            public function index()
            {
                // Ngay đầu tệp, đảm bảo định nghĩa base URL và API token từ biến môi trường
                $token_api = env('TMDB_API_TOKEN');
                $base_url = env('TMDB_BASE_URL', 'https://api.themoviedb.org/3');

                // Phổ biến
                $popularMovie = Http::withToken($token_api)
                    ->get("{$base_url}/movie/popular?language=vi-VN")
                    ->json()['results'];

                // Sắp chiếu
                $upcomingMovie = Http::withToken($token_api)
                    ->get("{$base_url}/movie/upcoming?language=vi-VN")
                    ->json()['results'];

                // Tạo mảng chứa thông tin phim
                $popularMovies = [];
                foreach ($popularMovie as $movie) {
                    $popularMovies[] = [
                        'title' => $movie['title'],
                        'poster' => 'https://image.tmdb.org/t/p/w500' . $movie['poster_path'],
                        'release_date' => $movie['release_date'],
                        'id' => 'https://www.themoviedb.org/movie/' . $movie['id'],
                        'backdrop' => 'https://image.tmdb.org/t/p/original' . $movie['backdrop_path'], 
                    ];
                }

                $upcomingMovies = [];
                foreach ($upcomingMovie as $movie) {
                    $upcomingMovies[] = [
                        'title' => $movie['title'],
                        'poster' => 'https://image.tmdb.org/t/p/w500' . $movie['poster_path'],
                        'release_date' => $movie['release_date'],
                        'id' => 'https://www.themoviedb.org/movie/' . $movie['id'],
                        'backdrop' => 'https://image.tmdb.org/t/p/w1250' . $movie['backdrop_path'], 
                    ];
                }


                // Truyền dữ liệu vào view
                return view('pages.main', [
                    'popularMovies' => $popularMovies,
                    'upcomingMovies' => $upcomingMovies,
                ]);
            }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}