@extends('admin.layout.app')



@section('content')

    <div class="container-fluid bg-white p-3">
        <div class="row mx-0">
            <div class="col-12">
                <form action="{{route('dashboard.product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group my-2">
                        <label for="name">Name <sup class="text-danger">*</sup></label>
                        <input type="text" name="name" id="name" class="form-control">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="slug">slug</label>
                        <input type="text" name="slug" id="slug" class="form-control">
                        @error('slug')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="category_id">Category <sup class="text-danger">*</sup></label>
                        <select  name="category_id" id="category_id" class="form-select">
                            <option value="null" disabled selected>--Select--</option>
                            @forelse($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @if ($cat->children)
                                    @foreach ($cat->children as $childCategory)
                                        @include('admin.sidebar.categories.child_option', ['childCategory' => $childCategory, 'level' => 1])
                                    @endforeach
                                @endif
                            @empty
                                <option value="null" disabled>0 Categories found</option>
                            @endforelse
                        </select>
                        @error('category_id')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group my-2">
                        <label for="cost">Cost<sup class="text-danger">*</sup> <sup><small>price this product cost to store</small></sup></label>
                        <input type="number" name="cost" id="cost"  placeholder="0000.00" class="form-control">
                        @error('cost')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="sale_price">Sale_price <sup><small>If product is on sale</small></sup></label>
                        <input type="number" name="sale_price" placeholder="0000.00" id="sale_price" class="form-control">
                        @error('sale_price')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="price">Price<sup class="text-danger">*</sup></label>
                        <input type="number" name="price" placeholder="0000.00"  id="price" class="form-control">
                        @error('price')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="stock">Stock<sup class="text-danger">*</sup></label>
                        <input type="number" name="stock" placeholder="stock stock store has" min="1" id="stock" class="form-control">
                        @error('stock')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="tags">Tags</label>
                        <input type="text" name="tags" id="tags" placeholder="keywords separated by comma e.g,'product, specification' "  class="form-control">
                        @error('tags')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="variants">Variants</label>
                        <input type="text" name="variants" id="variants" class="form-control">
                        @error('variants')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="weight">Weight</label>
                        <input type="text" name="weight" id="weight" class="form-control">
                        @error('weight')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group my-2">
                        <label for="description">Product Description<sup class="text-danger">*</sup></label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                        @error('description')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="featured_image">Featured Image <sup class="text-danger">*</sup><small>[Supported formats JPG, PNG, JPEG, WEBP - max size:2mb ]</small></label>
                        <input type="file" name="featured_image" id="featured_image" class="form-control">
                        @error('featured_image')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-check my-4">
                        <label for="free_delivery" class="form-check-label">Free Delivery</label>
                        <input type="checkbox" name="free_delivery" id="free_delivery" class="form-check-input">
                        @error('free_delivery')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <h3 class="mt-5">Gallery/Slider Images</h3>
                    <hr>
                    <div class="form-group my-2">
                        <label for="images">Images<small>[Supported formats JPG, PNG, JPEG, WEBP - max size:2mb ]</small></label>
                        <input type="file" name="images[]" id="image" multiple class="form-control">
                        @error('images')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <h3 class="mt-3">SEO</h3>
                    <hr>

                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" name="meta_title" id="meta_title" class="form-control">
                        @error('meta_title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="form-group my-2">
                        <label for="meta_keywords">Meta keywords</label>
                        <input type="text" name="meta_keywords" placeholder="keywords separated by comma e.g,'product, specification' " id="meta_keywords" class="form-control">
                        @error('meta_keywords')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea name="meta_description" id="meta_description" class="form-control"></textarea>
                        @error('meta_description')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="row mx-0 mt-3">
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

<script>

$(document).ready(function(){
    $('#cost, #price, #sale_price').inputmask('0000.00');
})

        $('#name').on('change',function(e){
            $('#slug-loader').html('<i class="fa fa-spinner fa-spin"></i>')
            let value='';
            value+=e.target.value;
            // console.log(value);
            $(this).on('blur',function(){
                $.ajax({
                    url:`{{route('dashboard.product.slug.create')}}`,
                    type:'post',
                    data:{'name':value,'_token':'{{@csrf_token()}}'},
                    success:(resp)=>{
                        $('#slug').val(resp.slug);
                        $('#slug-loader').html('<i class="fa fa-check text-success"></i>')
                    },
                    error:(xhr, ajaxOptions, thrownError)=>{
                        var server_error=JSON.parse(xhr.responseText);
                        $('#slug-loader').html('<i class="fa fa-cross text-danger"></i>'+ server_error.message);

                        console.log(server_error.message);
                    }
                })
            })
        })

    </script>

@endsection

