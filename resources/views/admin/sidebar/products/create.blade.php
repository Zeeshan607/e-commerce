@extends('admin.layout.app')



@section('content')

    <div class="container-fluid bg-white">
        <div class="row mx-0">
            <div class="col-12">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                        @error('name')
                            <span class="text-danger">{{$error}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">slug</label>
                        <input type="text" name="slug" id="slug" class="form-control">
                        @error('slug')
                        <span class="text-danger">{{$error}}</span>
                        @enderror
                    </div>
                    <div class="form-select">
                        <label for="parent_id">Parent Category</label>
                        <select  name="parent_id" id="parent_id" class="form-control-select">
                            <option value="null" disabled>--Select--</option>
                            <option value="1">cat1</option>
                        </select>
                        @error('slug')
                        <span class="text-danger">{{$error}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control-file">
                        @error('image')
                        <span class="text-danger">{{$error}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                        @error('description')
                        <span class="text-danger">{{$error}}</span>
                        @enderror
                    </div>
                    <div class="row mx-0">
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
