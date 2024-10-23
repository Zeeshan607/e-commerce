<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ProductImages;
use App\Services\GlobalHelpersService;
use App\Services\ImageOptimizationService;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductImagesHandlingController extends Controller
{
    //

    public function replaceImage(Request $request, String $id){
        if($request->ajax()){
        $product= Product::find($id);
        $productImage= ProductImages::where(['product_id'=>$id, 'id'=>$request->img_id])->first();
        $fileNameToStore = GlobalHelpersService::processImageName($request->image,"webp");
        $imgService = new ImageOptimizationService($request->image->getPathname());
        $optimizedImage = $imgService->generateOptimizedWebp();
        if(Storage::disk('public')->exists("products/".$product->slug."/".$productImage->image)  && Storage::disk('public')->exists("products/".$product->slug."/blur/".$productImage->image)){
            Storage::disk('public')->delete("products/".$product->slug."/".$productImage->image);
            Storage::disk('public')->delete("products/".$product->slug."/blur/".$productImage->image);
        }
        Storage::disk('public')->put("products/".$product->slug."/".$fileNameToStore, (string) $optimizedImage);
        Storage::disk('public')->put("products/".$product->slug."/blur/".$fileNameToStore,  $imgService->getBlurVersionWebp());
        $productImage->image=$fileNameToStore;
        $productImage->save();
        return response()->json(['msg'=>"Image replaced successfully",'img'=>$productImage],200);
        }
        return response()->json(['msg'=>"Invalid request",'img'=>null],403);
        }

    public function deleteImage(Request $request, String $id){
        if($request->ajax()){
            $product= Product::find($id);
            $productImage= ProductImages::where(['product_id'=>$product->id, 'id'=>$request->img_id])->first();
            if(Storage::disk('public')->exists("products/".$product->slug."/".$productImage->image) && Storage::disk('public')->exists("products/".$product->slug."/blur/".$productImage->image) ){
                Storage::disk('public')->delete("products/".$product->slug."/".$productImage->image);
                Storage::disk('public')->delete("products/".$product->slug."/blur/".$productImage->image);
            }
            $productImage->delete();
            return response()->json(['msg'=>"Image replaced successfully",'img'=>$productImage],200);
        }
        return response()->json(['msg'=>"Invalid request"],403);

    }

    public function markImageAsFeatured(Request $request, String $id){
        if($request->ajax()){
            $product= Product::find($id);
            $alreadyFeatured=ProductImages::where(['product_id'=>$product->id, 'is_featured'=>true])->first();
            $alreadyFeatured->is_featured=false;
            $alreadyFeatured->save();
            $productImage= ProductImages::where(['product_id'=>$product->id, 'id'=>$request->img_id])->first();
            if($productImage->is_featured){
                return response()->json(['msg'=>"Image is already marked as featured",'img'=>$productImage],200);
            }
            $productImage->is_featured=true;
            $productImage->save();
            return response()->json(['msg'=>"Image marked as featured successfully",'img'=>$productImage],200);
        }
        return response()->json(['msg'=>"Invalid request"],403);
        }




}
