@extends('admin.layout.app')



@section('content')

    <div class="container-fluid bg-white p-3">
        <div class="row mx-0">
            <div class="col-12">
                <form action="{{route('dashboard.category.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug" title="please wait slug will be automatically populated">slug</label>
                        <input type="text" name="slug" id="slug" class="form-control" readonly title="please wait slug will be automatically populated">
                        <div id="slug-loader"></div>
                        @error('slug')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="parent_id">Parent Category</label>
                        <select  name="parent_id" id="parent_id" class="form-select ">
                            <option value="null" disabled selected>--Select--</option>
                            @forelse($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                                @empty
                                <option value="null" disabled>0 Categories found</option>
                                @endforelse
                        </select>
                        @error('slug')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class=" form-control form-control-file">
                        @error('image')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                        @error('description')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="row mx-0 mt-2">
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


    $('#name').on('change',function(e){
        $('#slug-loader').html('<i class="fa fa-spinner fa-spin"></i>')
        let value='';
        value+=e.target.value;
        // console.log(value);
        $(this).on('blur',function(){
            $.ajax({
                url:`{{route('dashboard.category.slug.create')}}`,
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
