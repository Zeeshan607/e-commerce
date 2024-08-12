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
                            <th>Sub Category</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>{{$category->children}}</td>
                            <td><img src="{{asset('/storage/').$category->image}}" alt="product_image_here" width="300px" height="100%"></td>
                            <td>
                                <a href=""><i class="fa fa-edit me-2"></i></a>
                                <a href="#"  class="mx-3" onclick="
                                event.preventDefault();
                                swal({
                                title:'Are you sure?',
                                text:'You want to move this post to Trash!',
                                type: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#324cdd',
                                confirmButtonText: 'Yes, move it!',
                                closeOnConfirm: true
                                },function(resp){
                                if(resp){
                                $('#delRecord'+`{{$post->id}}`).submit();
                                }
                                });
                                            "><i class="fa fa-trash"></i></a>
                                <form action="{{route('dashboard.blog.post.destroy',$post->id)}}" method="post" id="delRecord{{$post->id}}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                            @empty
                            <tr>
                                <td colspan="4">
                                    0 Products found</td>
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
