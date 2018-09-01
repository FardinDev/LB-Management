@extends('layouts.app')
@section('content')

{{-- messages --}}
@if (session()->has('success_message'))
<script>
                $(document).ready(function(){
                        $("#exampleModalCenter").modal('show');
                        });
</script>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Message</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                                <div class="alert alert-success" name='success' id="success">
                                                {!! session()->get('success_message') !!}
                                </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     
                    </div>
                  </div>
                </div>
              </div>
@endif


@if (session()->has('error'))
<script>
                $(document).ready(function(){
                        $("#exampleModalCenter").modal('show');
                        });
</script>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Message</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                                <div class="alert alert-danger" name='danger' id="danger">
                                                {!! session()->get('error') !!}
                                </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     
                    </div>
                  </div>
                </div>
              </div>
@endif

@if(count($errors) > 0)
<div class="spacer"></div>
<div class="alert alert-danger">
<ul>
    @foreach ($errors->all() as $error)
        <li>{!! $error !!}</li>
    @endforeach
</ul>
</div>
@endif

{{-- messages --}}



        
<div class="container-fluid h-100" >
                       

                {{-- removedivstarts --}}
                
                        <div id="remove_form" name='remove_form'>
                        <h2 style="text-align: center">Remove From stock</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Product Names" title="Type in a name">

<table id="myTable" class="table table-dark table-striped" style="text-align:center">
<tr class="header">
<th >Product</th>
<th>Pack size</th>
<th>Available Units</th>
<th>Remove</th>
<th>Empty</th>
</tr>
@foreach($Products as $Product)
                        <tr>
                          <td>{{$Product->name}}</td>
                          <td>{{$Product->pack_size.' '.$Product->size_in}}</td>
                          <td>{{$Product->quantity}} pieces</td>
                        <td>
                                <form action="{{route('product.remove')}}" method="POST">
                                        {{ csrf_field() }}
                                       
                              


                                <div class="form-group row">
                                    <div class="col-xs-2">
                                
                                      <input type="number" class="form-control" name="number" id="number" placeholder="remove" required>
                                      <input type="hidden" name="id" id="id" value={{$Product->id}}>
                                    </div>
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                </div>
                                     
                                
                        </td>
                                
                                </form>
                        <td>
                                <a href="{{URL('/remove/empty/'."$Product->id")}}">
                                <button type="button" class="btn btn-danger" id="empty"  value={{$Product->id}}>Empty Stock</button>
                                </a>
                        </td>
                        </tr>
                @endforeach
</table>
</div>
</div>
<script>
function myFunction() {
var input, filter, table, tr, td, i;
input = document.getElementById("myInput");
filter = input.value.toUpperCase();
table = document.getElementById("myTable");
tr = table.getElementsByTagName("tr");
for (i = 0; i < tr.length; i++) {
td = tr[i].getElementsByTagName("td")[0];
if (td) {
if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
tr[i].style.display = "";
} else {
tr[i].style.display = "none";
}
}       
}
}
</script>

    
                

@endsection






