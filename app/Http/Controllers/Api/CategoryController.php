<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return response()->json([
            "response" => [
                "status"  => 200,
                "message" => "List Data Categories"
            ],
            "data" => $categories
        ], 200);
    }

    /**
     * show
     *
     * @param  mixed $slug
     * @return void
     */
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->first();

        if ($category) {

            return response()->json([
                "response" => [
                    "status"  => 200,
                    "message" => "Data Post Berdasarkan Kategori: " . $category->name
                ],
                "data" => $category
            ], 200);
        } else {

            return response()->json([
                "response" => [
                    "status"  => 404,
                    "message" => "Data Post Berdasarkan Kategori Tidak Ditemukan"
                ],
                "data" => null
            ], 404);
        }
    }
}
