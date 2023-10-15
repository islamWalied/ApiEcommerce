<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return CategoryResource::collection($category);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('categories', 'public');
        }

        $created = Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'parent_id' => $request->parent_id,
        ]);
        return new CategoryResource($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
            return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $image = $category->image;
        if ($request->hasFile('image'))
        {
            Storage::delete($category->image);
            $image = $request->file('image')->store('categories','public');
        }
        $updated = $category->update([
            'name' => $request->name ?? $category->name,
            'description' => $request->description ?? $category->description,
            'image' => $image,
            'parent_id' => $request->parent_id ?? $category->parent_id,
        ]);
        if (!$updated){
            return new JsonResponse([
               'errors' => 'failed to update the category'
            ]);
        }
        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if($category->image != null){
            Storage::delete($category->image);
        }
        $deleted = $category->forceDelete();
        if (!$deleted){
            return new JsonResponse([
                'errors' => 'failed to delete the category'
            ]);
        }
        return new JsonResponse([
            'errors' => 'the category is deleted successfully'
        ]);
    }
}
