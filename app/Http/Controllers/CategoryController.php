<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Liste des catégories.
     *
     * @return void
     */
    public function list()
    {
        $categories = Category::all();
        return response()->json($categories, 200);
    }
}
