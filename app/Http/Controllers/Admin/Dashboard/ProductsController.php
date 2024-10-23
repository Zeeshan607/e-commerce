<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use App\Services\GlobalHelpersService;
use App\Services\ImageOptimizationService;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\DataTables\ProductsDataTable;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductsDataTable $dataTable)
    {
//        dd($dataTable);
        return $dataTable->render('admin.sidebar.products.index');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['categories'] = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.sidebar.products.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        //

        $data=$request->validated();

        $product= new Product();
        if($request->has('tags') && $request->get('tags') !== null){
            $data['tags']= json_encode($this->convertCommaSeparatedStringToArray($request->tags));
        }
        if($request->has('variants') && $request->get('variants') !== null){
            $data['variants']= json_encode($this->convertCommaSeparatedStringToArray($request->variants));
        }
        if($request->has('meta_keywords') && $request->get('meta_keywords') !== null){
            $data['meta_keywords']= json_encode($this->convertCommaSeparatedStringToArray($request->meta_keywords));
        }

        if($request->has('sale_price') && $request->get('sale_price') !== null){
            $request->validate([
                'sale_price'=>'numeric|between:0,99.99',
            ]);
            $data['sale_price']=$request->sale_price;
        }
        if($request->has('stock') && $request->get('stock') !== null){
            $request->validate([
                'stock'=>'required|numeric|min:1',
            ]);
            $data['stock']=$request->stock;
        }
        if($request->has('weight') && $request->get('weight') !== null){
            $request->validate([
                'weight'=>'numeric|between:0,99.99',
            ]);
            $data['weight']=$request->weight;
        }
        if($request->has('free_delivery') && $request->get('free_delivery') !== null){
            $data['free_delivery']=$request->free_delivery=="on"?1:0;
        }
        if($request->has('meta_title') && $request->get('meta_title') !== null){
            $request->validate([
                'meta_title'=>'required|string',
            ]);
            $data['meta_title']=$request->meta_title;
        }
        if($request->has('meta_description') && $request->get('meta_description') !== null){
            $request->validate([
                'meta_description'=>'required|string',
            ]);
            $data['meta_description']=$request->meta_description;
        }
        $category=Category::findOrFail($data['category_id']);
        $data['sku']=$this->generateSKU($category->name, $data['slug']);

        if($request->has('featured_image')){
                $fileNameToStore = GlobalHelpersService::processImageName($request->has('featured_image'),"webp");
                $imgService = new ImageOptimizationService($request->has('featured_image')->getPathname());
                $optimizedImage = $imgService->generateOptimizedWebp();
                Storage::disk('public')->put("products/".$data['slug']."/featured/".$fileNameToStore, (string) $optimizedImage);
                Storage::disk('public')->put("products/".$data['slug']."/featured/blur/".$fileNameToStore,  $imgService->getBlurVersionWebp());
                $data['featured_image']=$fileNameToStore;
        }

        $product->fill($data);
        $product->save();

        if($request->has('images') && count($request->images) >0){
            foreach($request->images as $index=>$img){
                $fileNameToStore = GlobalHelpersService::processImageName($img,"webp");
                $imgService = new ImageOptimizationService($img->getPathname());
                $optimizedImage = $imgService->generateOptimizedWebp();
                Storage::disk('public')->put("products/".$data['slug']."/".$fileNameToStore, (string) $optimizedImage);
                Storage::disk('public')->put("products/".$data['slug']."/blur/".$fileNameToStore,  $imgService->getBlurVersionWebp());
                $pi= new ProductImages();
                $pi->product_id=$product->id;
                $pi->image=$fileNameToStore;
                $pi->save();
            }
        }
        return redirect()->route('dashboard.product.index')->with('success','Product created successfully');

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

        $data['product']=Product::with(['images'])->find($id);
        $data['categories'] = Category::all();

        return view('admin.sidebar.products.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        //
        $data=$request->validated();

        $product= Product::findOrfail($id);
        if($request->has('tags') && $request->get('tags') !== null){
            $data['tags']= json_encode($this->convertCommaSeparatedStringToArray($request->tags));
        }
        if($request->has('variants') && $request->get('variants') !== null){
            $data['variants']= json_encode($this->convertCommaSeparatedStringToArray($request->variants));
        }
        if($request->has('meta_keywords') && $request->get('meta_keywords') !== null){
            $data['meta_keywords']= json_encode($this->convertCommaSeparatedStringToArray($request->meta_keywords));
        }

        if($request->has('sale_price') && $request->get('sale_price') !== null){
            $request->validate([
                'sale_price'=>'numeric|between:0,99.99',
            ]);
            $data['sale_price']=$request->sale_price;
        }
        if($request->has('stock') && $request->get('stock') !== null){
            $request->validate([
                'stock'=>'required|numeric|min:0',
            ]);
            $data['stock']=$request->stock;
        }
        if($request->has('weight') && $request->get('weight') !== null){
            $request->validate([
                'weight'=>'numeric|between:0,99.99',
            ]);
            $data['weight']=$request->weight;
        }
        if($request->has('free_delivery') && $request->get('free_delivery') !== null){
            $data['free_delivery']=$request->free_delivery=="on"?1:0;
        }
        if($request->has('meta_title') && $request->get('meta_title') !== null){
            $request->validate([
                'meta_title'=>'required|string',
            ]);
            $data['meta_title']=$request->meta_title;
        }
        if($request->has('meta_description') && $request->get('meta_description') !== null){
            $request->validate([
                'meta_description'=>'required|string',
            ]);
            $data['meta_description']=$request->meta_description;
        }

//        dd($request->all());
        if($request->hasfile('featured_image') ){
            $fileNameToStore = GlobalHelpersService::processImageName($request->featured_image,"webp");
            $imgService = new ImageOptimizationService($request->featured_image->getPathname());
            $optimizedImage = $imgService->generateOptimizedWebp();
            if(Storage::disk('public')->exists("products/".$product->slug."/featured/".$product->featured_image)  && Storage::disk('public')->exists("products/".$product->slug."/featured/blur/".$product->featured_image)){
                Storage::disk('public')->delete("products/".$product->slug."/featured/".$product->featured_image);
                Storage::disk('public')->delete("products/".$product->slug."/featured/blur/".$product->featured_image);
            }
            Log::info(Storage::disk('public')->put("products/".$data['slug']."/featured/".$fileNameToStore, (string) $optimizedImage));
//            Storage::disk('public')->put("products/".$data['slug']."/featured/".$fileNameToStore, (string) $optimizedImage);
            Storage::disk('public')->put("products/".$data['slug']."/featured/blur/".$fileNameToStore,  $imgService->getBlurVersionWebp());
            $data['featured_image']=$fileNameToStore;
        }
        $product->fill($data);
        $product->save();

        if($request->has('images') && count($request->images) > 0){
            foreach($request->images as $index=>$img){
                $fileNameToStore = GlobalHelpersService::processImageName($img,"webp");
                $imgService = new ImageOptimizationService($img->getPathname());
                $optimizedImage = $imgService->generateOptimizedWebp();
                Storage::disk('public')->put("products/".$product->slug."/".$fileNameToStore, (string) $optimizedImage);
                Storage::disk('public')->put("products/".$product->slug."/blur/".$fileNameToStore,  $imgService->getBlurVersionWebp());
                $pi= new ProductImages();
                $pi->product_id=$product->id;
                $pi->image=$fileNameToStore;
                $pi->save();
            }
        }
        return redirect()->route('dashboard.product.index')->with('success','Product created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product=Product::find($id);
        if(Storage::disk('public')->exists("products/".$product->slug)){
            Storage::disk('public')->deleteDirectory("products/".$product->slug);
        }
        ProductImages::where('product_id','=',$product->id)->delete();
        $product->delete();
        return redirect()->route('dashboard.product.index')->with('success','Product deleted successfully');
    }

    /**
     * create product slug
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createSlug(Request $request){
        $slug = SlugService::createSlug(Product::class, 'slug', $request->name);
        return response()->json(['slug'=>$slug]);
    }

    /**
     * create array of string containing words saperated by commanas
     * @param $string
     * @return array
     */
    private function convertCommaSeparatedStringToArray($string){
        // Convert the comma-separated string into an array
        $keywordsArray = explode(',',$string);
        // Optional: Trim whitespace around each keyword
        return array_map('trim', $keywordsArray);
    }

    /**
     * creates unqiue SKU for product
     * @param $categoryCode
     * @param $brandCode
     * @return string
     */
    private function generateSKU($categoryCode, $brandCode) {
        // Ensure category and brand codes are uppercase and trimmed to a set length
        $category = strtoupper(substr($categoryCode, 0, 4)); // First 4 letters of category
        $brand = strtoupper(substr($brandCode, 0, 3));      // First 3 letters of brand

        // Format product ID to always be 5 digits long (e.g., 00001, 00234)
        $uniqueId = str_pad(rand(10000, 99999), 5, '0', STR_PAD_LEFT);

        // Combine to form SKU
        $sku = $category . '-' . $brand . '-' . $uniqueId;
        return $sku;
    }

}
