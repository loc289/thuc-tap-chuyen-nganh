<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Favorite;
use App\Models\Movie;
use App\Models\Nation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;

class MovieController extends Controller
{
    protected $nations;
    protected $categories;

    public function __construct()
    {
        $nations = Nation::all();
        View::share('nations', $nations);

        $categories = Category::all();
        View::share('categories', $categories);

        $this->nations = $nations;
        $this->categories = $categories;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all()->where('status', config('constants.status_active'));

        $trending_movies = [];

        foreach ($movies as $movie) {
            if ($movie->trending) {
                $trending_movies[] = $movie;
            }
        }

        $data = [
            'movies' => $movies,
            'trending_movies' => $trending_movies,
        ];

        // Truyền dữ liệu vào view
        return view('pages.main', $data);
    }

    /**
     * Trang chi tiết phim.
     */
    public function show(int $id)
    {
        $movie = Movie::find($id);

        $data = [
            'movie' => $movie,
        ];

        return view('pages.movie', $data);
    }

    /**
     * Trang danh mục phim.
     */
    public function category(int $id)
    {
        $movies = Movie::where('category_id', $id)->where('status', config('constants.status_active'))->get();
        $category_name = Category::find($id)->name;

        $data = [
            'movies' => $movies,
            'categoryName' => $category_name,
        ];

        return view('pages.category', $data);
    }

    public function nation(int $id)
    {
        $movies = Movie::where('nation_id', $id)->where('status', config('constants.status_active'))->get();
        $category_name = Nation::find($id)->name;

        $data = [
            'movies' => $movies,
            'categoryName' => $category_name,
        ];

        return view('pages.category', $data);
    }

    /**
     * Trang tìm kiếm phim.
     */
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $movies = Movie::where('name', 'like', "%$keyword%")->where('status', config('constants.status_active'))->get();

        $data = [
            'movies' => $movies,
            'categoryName' => 'Tìm kiếm',
        ];

        return view('pages.category', $data);
    }

    /**
     * Trang xem phim.
     */
    public function watch(int $id)
    {
        $movie = Movie::find($id);

        $data = [
            'movie' => $movie,
        ];

        return view('pages.watch', $data);
    }

    /**
     * Hàm post like phim.
     */
    public function like(int $id)
    {
        $checkExists = Favorite::where([
            'movie_id' => $id,
            'customer_id' => Auth::guard('web')->id(),
        ])->exists();

        if ($checkExists) {
            Favorite::where([
                'movie_id' => $id,
                'customer_id' => Auth::guard('web')->id(),
            ])->delete();
        } else {
            Favorite::create([
                'movie_id' => $id,
                'customer_id' => Auth::guard('web')->id(),
            ]);
        }

        return redirect()->back();
    }

    /**
     * Trang danh sách phim yêu thích.
     */
    public function favorites()
    {
        $favorites = Auth::guard('web')->user()->favorites;

        $movies = [];

        foreach ($favorites as $favorite) {
            $movies[] = $favorite->movie;
        }

        $data = [
            'movies' => $movies,
            'categoryName' => 'Yêu thích',
        ];

        return view('pages.category', $data);
    }
}
