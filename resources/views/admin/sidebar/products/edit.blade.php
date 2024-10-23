@extends('admin.layout.app')



@section('content')

    <div class="container-fluid bg-white p-3">
        <div class="row mx-0">
            <div class="col-12">
                <form action="{{route('dashboard.product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group my-2">
                        <label for="name">Name <sup class="text-danger">*</sup></label>
                        <input type="text" name="name" id="name"  value="{{old('name',$product->name)}}" class="form-control">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="slug">slug</label>
                        <input type="text" name="slug" id="slug" value="{{old('slug',$product->slug)}}" class="form-control">
                        <div id="slug-loader">
                        </div>
                        @error('slug')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="category_id">Category <sup class="text-danger">*</sup></label>
                        <select  name="category_id" id="category_id" class="form-select">
                            <option value="null" disabled selected>--Select--</option>
                            @forelse($categories as $cat)
                                <option value="{{ $cat->id }}" >{{ $cat->name }}</option>
                                @if ($cat->children)
                                    @foreach ($cat->children as $childCategory)
                                        @include('admin.sidebar.categories.child_option', ['childCategory' => $childCategory, 'product'=>$product, 'level' => 1])
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
                        <input type="number" name="cost" id="cost" value="{{old('cost',$product->cost)}}" placeholder="0000.00" class="form-control">
                        @error('cost')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="sale_price">Sale_price <sup><small>If product is on sale</small></sup></label>
                        <input type="number" name="sale_price" value="{{old('sale_price', $product->sale_price)}}" placeholder="0000.00" id="sale_price" class="form-control">
                        @error('sale_price')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="price">Price<sup class="text-danger">*</sup></label>
                        <input type="number" name="price" placeholder="0000.00" value="{{old('price', $product->price)}}" id="price" class="form-control">
                        @error('price')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group my-2">
                        <label for="stock">Stock<sup class="text-danger">*</sup></label>
                        <input type="number" name="stock" placeholder="stock stock store has" value="{{old('stock', $product->stock)}}" min="0" id="stock" class="form-control">
                        @error('stock')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="tags">Tags</label>
                        <input type="text" name="tags" id="tags" value="{{old('tags', $product->tags?implode(',',  json_decode($product->tags)):''  )}}" placeholder="keywords separated by comma e.g,'product, specification' "  class="form-control">
                        @error('tags')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="variants">Variants</label>
                        <input type="text" name="variants" id="variants" value="{{old('variants', $product->variants?implode(',',  json_decode($product->variants)):'')}}" class="form-control">
                        @error('variants')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="weight">Weight</label>
                        <input type="text" name="weight" id="weight" value="{{old('weight',$product->weight)}}" class="form-control">
                        @error('weight')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group my-2">
                        <label for="description">Product Description<sup class="text-danger">*</sup></label>
                        <textarea name="description" id="description" class="form-control">{{$product->description}}</textarea>
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
                        <input type="checkbox" name="free_delivery" @if($product->free_delivery) checked @endif id="free_delivery" class="form-check-input">
                        @error('free_delivery')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <h3 class="mt-5">Gallery/Slider Images</h3>
                    <hr>
                    <div class="form-group my-2" id="image-manager">
                        <div class="images-list d-flex flex-row flex-md-wrap flex-sm-wrap">
                            @forelse($product->images as $index=>$image)
                                <figure class="d-flex flex-row mx-2" id="figure-{{$image->id}}">
                                    <img src="{{asset('/storage/products').'/'.$product->slug.'/'.$image->image}}" id="image-{{$image->id}}" alt="{{$product->slug.'-'.$index}}" class="img-thumbnail img-fluid " width="100px" height="100%">
                                    <div class="d-flex flex-column mt-2 ms-1">
                                       <label for="replace_image" class="btn btn-sm btn-primary mb-1" title="Replace image"><small><i class="fa fa-refresh"></i></small>
                                        <input type="file" name="replace_image" id="replace_image" data-image-id="{{$image->id}}" hidden>
                                       </label>
                                        <a href="javascript:void(0)" onClick="MarkImageAsFeatured(event, '{{$image->id}}')" id="mark-as-featured-btn-{{$image->id}}" class="btn btn-sm btn-success  @if($image->is_featured) text-dark @endif mb-1 @if($image->is_featured) disabled @endif " title="Mark image as Featured"><small><i class="fas fa-check-circle  " ></i></small></a>
                                        <a href="javascript:void(0)" onClick="deleteImage(event, '{{$image->id}}')" class="btn btn-sm btn-danger" title="Delete image"><small><i class="fa fa-trash"></i></small></a>
                                    </div>
                                </figure>

                                @empty
                                <p>NO Image Attached</p>
                                @endforelse
                        </div>
                        <label for="images">Choose Images<small>[Supported formats JPG, PNG, JPEG, WEBP - max size:2mb ]</small></label>
                        <input type="file" name="images[]" id="image" multiple class="form-control">
                        @error('images')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <h3 class="mt-3">SEO</h3>
                    <hr>

                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" name="meta_title" id="meta_title" value="{{old('meta_title', $product->meta_title)}}" class="form-control">
                        @error('meta_title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="form-group my-2">
                        <label for="meta_keywords">Meta keywords</label>
                        <input type="text" name="meta_keywords" value="{{old('meta_keywords', $product->meta_keyworkds?implode(',',  json_decode($product->meta_keywords)):'')}}" placeholder="keywords separated by comma e.g,'product, specification' " id="meta_keywords" class="form-control">
                        @error('meta_keywords')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea name="meta_description" id="meta_description"  class="form-control">{{$product->meta_description}}</textarea>
                        @error('meta_description')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="row mx-0 mt-3">
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        const allFigures =JSON.parse('{!! $product->images !!}');
        // console.log(allFigures)
        allFigures.map(fig=>{
            console.log(fig)
        })
        function MarkImageAsFeatured(e, img_id){
            e.target.classList.add('disabled');
            $.ajax({
                url:`{{route('dashboard.product.image.mark_as_featured',$product->id )}}`,
                type:'post',
                data: {'img_id':img_id,"_token":'{{@csrf_token()}}'},
                success:(resp)=>{
                    console.log(resp);
                    // e.target.classList.add('disabled');
                    const allFigures =JSON.parse('{!! $product->images !!}');
                    allFigures.map(fig=>{
                        console.log(fig)
                        if(fig.is_featured){
                            document.querySelector("#mark-as-featured-btn-" + fig.id).classList.remove('text-dark');
                            document.querySelector("#mark-as-featured-btn-" + fig.id).classList.remove('disabled');
                        }
                    })
                    let btn= document.querySelector("#mark-as-featured-btn-" + resp.img.id);
                    btn.classList.add("text-dark");
                    btn.classList.add("disabled");
                    Swal.fire({
                        icon: "success",
                        title: "Success",
                        text: "Image successfully marked as featured",
                    });
                },
                error:(xhr, ajaxOptions, thrownError)=>{
                    var server_error=JSON.parse(xhr.responseText);
                    e.target.classList.remove('disabled');
                     Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went wrong! Try again",
                    });
                }
            })
        }
        function deleteImage(e, img_id){
            e.target.classList.add('disabled');
            new Swal({
                title:'Are you sure?',
                text:'You want to delete this Image !',
                showCancelButton: true,
                confirmButtonColor: '#324cdd',
                confirmButtonText: 'Yes, Delete it!',
            }).then(function(resp){
                if(resp.isConfirmed){
                    $.ajax({
                        url:`{{route('dashboard.product.image.delete',$product->id )}}`,
                        type:'post',
                        data: {'img_id':img_id,"_token":'{{@csrf_token()}}'},
                        success:(resp)=>{
                            console.log(resp);
                            e.target.classList.remove('disabled');
                            $('#figure-'+resp.img.id).remove();
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: "Image removed successfully",
                            });
                            {{--$("#image-"+resp.img.id).attr('src',"{{ asset('/storage/products') }}" + "/{{ $product->slug }}/" + resp.img.image);--}}
                        },
                        error:(xhr, ajaxOptions, thrownError)=>{
                            var server_error=JSON.parse(xhr.responseText);
                            e.target.classList.remove('disabled');
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "Something went wrong! Try again",
                            });
                        }
                    })
                }else{
                    e.target.classList.remove('disabled');
                }
            });

        }

        $(document).ready(function(){
            //mask inputs
            $('#cost, #price, #sale_price').mask('0000.00');
            // slug generator
            $('#name').on('change',function(e){
                $('#slug-loader').html('<i class="fa fa-spinner fa-spin"></i>')
                let value='';
                value+=e.target.value;
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
                            // console.log(server_error.message);
                        }
                    })
                })
            })
            //image replace request
              $('#replace_image').on('change',function(e){
                        const img_id= $(e.target).data('image-id');
                        const formData= new FormData();
                        formData.append('image',e.target.files[0]);
                        formData.append('img_id',img_id);
                        formData.append('_token','{{@csrf_token()}}')
                  // Log each key-value pair in the FormData
                  // for (let pair of formData.entries()) {
                  //     console.log(pair[0]+ ', ' + pair[1]);
                  // }
                  $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': '{{@csrf_token()}}'
                      }
                  });
                  $.ajax({
                      url:`{{route('dashboard.product.image.replace',$product->id )}}`,
                      type:'post',
                      data:formData,
                      processData:false,
                      contentType: false,
                      success:(resp)=>{
                          $("#image-"+resp.img.id).attr('src', "{{ asset('/storage/products') }}" + "/{{ $product->slug }}/" + resp.img.image);
                      },
                      error:(xhr, ajaxOptions, thrownError)=>{
                          var server_error=JSON.parse(xhr.responseText);
                          Swal.fire({
                              icon: "error",
                              title: "Oops...",
                              text: "Something went wrong! Try again",
                          });
                      }
                  })
                });

            //






        });// jquery init wrap



    </script>

@endsection

