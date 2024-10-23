<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\GlobalHelpersService;
use App\Services\ImageOptimizationService;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['categories']=Category::with(['children'])->paginate(10);
        return view('admin.sidebar.categories.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['categories']= Category::all();
        return view('admin.sidebar.categories.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        //

        $data=$request->validated();
        $fileNameToStore='';
        if($request->hasFile('image')){
            $fileNameToStore = GlobalHelpersService::processImageName($request->file('image'),"webp");
            $imgService = new ImageOptimizationService($request->file('image')->getPathname());
            $optimizedImage = $imgService->generateOptimizedWebp();
            Storage::disk('public')->put("categories/".$data['slug']."/".$fileNameToStore, (string) $optimizedImage);
            Storage::disk('public')->put("categories/".$data['slug']."/blur/".$fileNameToStore,  $imgService->getBlurVersionWebp());
        }
        $data['image'] = $fileNameToStore;
        if($request->has('parent_id')){
            $data['parent_id']=$request->parent_id;
        }
        $cat= new Category();
        $cat->fill($data);
        $cat->save();

        return redirect()->route('dashboard.category.index')->with(['msg'=>"Category created successfully"]);


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
        $data['category']=Category::findOrFail($id);
        $data['categories']= Category::all();
        return view('admin.sidebar.categories.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest  $request, string $id)
    {
        //
        $data=$request->validated();
        $fileNameToStore='';
        if($request->hasFile('image')){
            $fileNameToStore = GlobalHelpersService::processImageName($request->file('image'),"webp");
            $imgService = new ImageOptimizationService($request->file('image')->getPathname());
            $optimizedImage = $imgService->generateOptimizedWebp();
            Storage::disk('public')->put("categories/".$data['slug']."/".$fileNameToStore, (string) $optimizedImage);
            Storage::disk('public')->put("categories/".$data['slug']."/blur/".$fileNameToStore,  $imgService->getBlurVersionWebp());
        }
        if($fileNameToStore){
            $data['image'] = $fileNameToStore;
        }
        if($request->has('parent_id')){
            $data['parent_id']=$request->parent_id;
        }
        $cat= Category::find($id);
        $cat->fill($data);
        $cat->save();

        return redirect()->route('dashboard.category.index')->with(['msg'=>"Category updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category= Category::findOrFail($id);
        // Image paths based on the category slug
        $imagePath = "categories/{$category->slug}/";
        // Check if the images exist and delete them
        if (Storage::disk('public')->exists($imagePath)) {
            // Delete the original images
            Storage::disk('public')->deleteDirectory($imagePath);
        }
        $category->delete();
        return redirect()->route('dashboard.category.index')->with(['msg'=>"Category deleted successfully"]);

    }

    public function createSlug(Request $request): \Illuminate\Http\JsonResponse
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug'=>$slug]);
    }

}
