@extends('admin.layout.app')



@section('content')

    <div class="container-fluid bg-white p-3">
        <div class="row mx-0">
            <div class="col-12">
                <form action="{{route('dashboard.category.update',$category->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{old('name',$category->name)}}" class="form-control">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">slug</label>
                        <input type="text" name="slug" id="slug"  value="{{old('slug',$category->slug)}}" class="form-control">
                        @error('slug')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="parent_id">Parent Category</label>
                        <select name="parent_id" id="parent_id" class="form-select ">
                            <option value="null" disabled selected>--Select--</option>
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
                        </select>
                        @error('prent_id')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control form-control-file">
                        @error('image')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control">{{old('description',$category->description)}}</textarea>
                        @error('description')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="row mx-0 mt-2">
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
