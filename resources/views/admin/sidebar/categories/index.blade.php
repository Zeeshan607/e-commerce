@extends('admin.layout.app')



@section('content')


    <div class="container-fluid bg-white p-3">
        <div class="row mx-0 mb-3">
            <div class="col-12 text-end">
                <a href="{{route('dashboard.category.create')}}" class="btn btn-primary">Create new Category</a>
            </div>
        </div>
        <div class="row mx-0">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Parent</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>{{$category->parent?->name}}</td>
                            <td><img src="{{asset('/storage/categories')."/".$category->slug."/".$category->image}}" alt="product_image_here" width="200px" height="100%"></td>
                            <td>
                                <a href="{{route('dashboard.category.edit',$category->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="#"  class=" btn btn-danger mx-3" onclick="
                                event.preventDefault();
                                new Swal({
                                title:'Are you sure?',
                                text:'You want to delete this category !',
                                showCancelButton: true,
                                confirmButtonColor: '#324cdd',
                                confirmButtonText: 'Yes, Delete it!',
                                }).then(function(resp){
                                    // console.log('accepted')
                                    if(resp.isConfirmed){
                                    $('#delRecord'+`{{$category->id}}`).submit();
                                    }
                                }); "><i class="fa fa-trash"></i></a>
                                <form action="{{route('dashboard.category.destroy',$category->id)}}" method="post" id="delRecord{{$category->id}}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                            @empty
                            <tr>
                                <td colspan="4">
                                    0 Category found</td>
                            </tr>

                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row mx-0">
            <div class="col-12 text-center">{{$categories->links()}}</div>
        </div>
    </div>



    @endsection
