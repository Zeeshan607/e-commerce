@extends('admin.layout.app')



@section('content')


    <div class="container-fluid bg-white p-3">
        <div class="row mx-0 my-2">

            <div class="col-12  text-end">
                <a href="{{route('dashboard.product.create')}}" class="btn btn-primary">Add new Product</a>
            </div>
        </div>
        <div class="row mx-0">
            <div class="col-12">
{{--               @dd($dataTable);--}}
                {{ $dataTable->table() }}
{{--                <div class="table-responsive">--}}
{{--                    <table class="table table-bordered">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th>Name</th>--}}
{{--                            <th>SKU</th>--}}
{{--                            <th>Category</th>--}}
{{--                            <th>Stock</th>--}}
{{--                            <th>Image</th>--}}
{{--                            <th>Actions</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @forelse($products as $product)--}}
{{--                        <tr>--}}
{{--                            <td>{{$product->name}}</td>--}}
{{--                            <td>{{$product->sku}}</td>--}}
{{--                            <td>{{$product->category?->name}}</td>--}}
{{--                            <td>{{$product->quantity." pieces"}}</td>--}}
{{--                            <td><img src="{{asset('/storage/products').'/'.$product->slug."/".$product->images[0]?->image}}" height="100%" width="200px" alt="{{$product->slug."-image"}}"></td>--}}
{{--                            <td>--}}
{{--                                <a href="{{route('dashboard.product.edit',$product->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>--}}
{{--                                <a href="#"  class=" btn btn-danger mx-3" onclick="--}}
{{--                                event.preventDefault();--}}
{{--                                new Swal({--}}
{{--                                title:'Are you sure?',--}}
{{--                                text:'You want to delete this product !',--}}
{{--                                showCancelButton: true,--}}
{{--                                confirmButtonColor: '#324cdd',--}}
{{--                                confirmButtonText: 'Yes, Delete it!',--}}
{{--                                }).then(function(resp){--}}
{{--                                    if(resp.isConfirmed){--}}
{{--                                    $('#delRecord'+`{{$product->id}}`).submit();--}}
{{--                                    }--}}
{{--                                }); "><i class="fa fa-trash"></i></a>--}}
{{--                                <form action="{{route('dashboard.product.destroy',$product->id)}}" method="post" id="delRecord{{$product->id}}">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                </form>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                            @empty--}}
{{--                            <tr>--}}
{{--                                <td>0 Products found</td>--}}
{{--                            </tr>--}}
{{--                        @endforelse--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>



    @endsection

@section('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endsection
