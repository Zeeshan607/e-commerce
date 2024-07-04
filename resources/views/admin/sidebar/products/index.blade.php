@extends('admin.layout.app')



@section('content')


    <div class="container-fluid bg-white p-3">
        <div class="row mx-0">
            <div class="col-12">
                <a href="{{route('dashboard.category.create')}}">Create new Category</a>
            </div>
        </div>
        <div class="row mx-0">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    @endsection
