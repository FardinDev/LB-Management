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


                <div class="container-fluid h-100" >
                        {{-- add form starts --}}
                        <div class="row justify-content-center align-items-center h-100">
                                        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3" id="add_form" name='add_form'>
                                        <h2 style="text-align: center">Add A New Product</h2>
                                        <br>



                                        <form action="{{route('product.store')}}" method="POST">

                                            {{ csrf_field() }}
                                                
                                                <div class="form-group">
                                                        {{--  <label for="name">Product Name</label>  --}}
                                                        <input type="text" class="form-control input-lg" id="name" name="name" placeholder="Enter Product Name" required>

                                                        
                                                </div>

                                                <div class="form-group">
                                                        
                                                  <input type="number" name="pack_size" id="pack_size" placeholder="Enter Pack Size" class="form-control input-lg" required>
                                                  
                                          
                                                </div>

                                                <div class="form-group">
                                                        {{--  <label for="pack_size">Product Size</label>  --}}
                                                        <select id="size_in" name="size_in" class="form-control input-lg">
                                                        <option value=0> Select Unit Size </option>
                                                        <option value="KG"> Kilogram (KG) </option>
                                                        <option value="LTR"> Liter (LTR) </option>
                                                        </select>
                                                        
                                                </div>

                                        

                                                <div class="form-group">
                                                        
                                                        <input type="number" name="quantity" id="quantity" placeholder="Enter Quantity" class="form-control input-lg" required>
                                                        
                                                <br>
                                                        <div class="form-group">
                                                                <button class="btn btn-info btn-lg btn-block" type="submit">Add Product</button>
                                                        </div>
                                                </div>
                                                

                                                
                                        

                                        

                                        </form>
                                        </div>


                                        
                        </div>
                </div>

       
                

@endsection






