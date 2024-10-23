
   <a href="{{route('dashboard.product.edit',$product->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="#"  class=" btn btn-danger mx-3" onclick="
                                event.preventDefault();
                                new Swal({
                                title:'Are you sure?',
                                text:'You want to delete this product !',
                                showCancelButton: true,
                                confirmButtonColor: '#324cdd',
                                confirmButtonText: 'Yes, Delete it!',
                                }).then(function(resp){
                                    if(resp.isConfirmed){
                                    $('#delRecord'+`{{$product->id}}`).submit();
                                    }
                                }); "><i class="fa fa-trash"></i></a>
                                <form action="{{route('dashboard.product.destroy',$product->id)}}" method="post" id="delRecord{{$product->id}}">
                                    @csrf
                                    @method('DELETE')
                                </form>
