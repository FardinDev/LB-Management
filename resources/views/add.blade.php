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



{{-- <div class="container-fluid h-100">
        <div class="row justify-content-center align-items-center h-100">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons" id="radio" >

                                        <label class="btn btn-secondary active" id="add" name="add" onclick="add()">
                                          <input type="radio" name="options" id="options" autocomplete="off" checked> Add To Stock
                                        </label>
                                        <label class="btn btn-secondary" id="remove" name="remove" onclick="remove()">
                                          <input type="radio" name="option" id="option" autocomplete="off"> Remove From Stock
                                        </label>
                        </div>
        </div>
</div>
<br> --}}
        

                <div class="container-fluid h-100" >
                        {{-- add form starts --}}
                        <div class="row justify-content-center align-items-center h-100">
                                        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3" id="add_form" name='add_form'>
                                        <h2 style="text-align: center">Add Products To stock</h2>
                                        <br>



                                        <form action="{{route('product.update')}}" method="POST">
                                                
                                                <div class="form-group">
                                                        {{--  <label for="name">Product Name</label>  --}}
                                                        <select id="name" name="name" class="form-control input-lg dynamic" data-dependent="pack_size">
                                                                        <option> Select Product</option>
                                                                @foreach($ProductNames as $ProductName)
                                                                        <option>{{$ProductName->name}}</option>
                                                                @endforeach   
                                                        </select>

                                                        
                                                </div>

                                                <div class="form-group" name='pack_size_div' id="pack_size_div" style="display: none">
                                                        {{--  <label for="pack_size">Product Size</label>  --}}
                                                        <select id="pack_size" name="pack_size" class="form-control input-lg dynamic">
                                                        <option> Select Size </option>
                                                        </select>
                                                        
                                                </div>

                                        

                                                <div class="form-group" name='quantity_div' id="quantity_div" style="display: none">
                                                        {{--  <label for="Quantity">Quantity</label>  --}}
                                                        {{--  <label for="available" id="available" name="available" >Available 90 units</label>
                                                        <br>  --}}
                                                        <input type="number" name="quantity" id="quantity" placeholder="Enter Quantity" class="form-control input-lg" required>
                                                        {{ csrf_field() }}
                                                <br>
                                                        <div class="form-group">
                                                                <button class="btn btn-info btn-lg btn-block" type="submit">Add Product</button>
                                                        </div>
                                                </div>
                                                

                                                
                                        

                                        

                                        </form>
                                        </div>


                                        
                        </div>
                </div>

       
                
<script>


{{-- main --}}
        $(document).ready(function(){



         $('.dynamic').change(function(){
                 
          if($(this).val() != '')
          {
           
                
           var select = $(this).attr("id");
           var value = $(this).val();
           var dependent = $(this).data('dependent');
           var _token = $('input[name="_token"]').val();

           $.ajax({
        
            url:"{{ route('product.fetch') }}",
            method:"POST",
            data:{select:select, value:value, _token:_token, dependent:dependent},
            success:function(result)
            {
             $('#'+dependent).html(result.output);
            }
        
           })
          }
         });
 
          $('#name').change(function(){
          $('#pack_size').val('');
          $('#pack_size_div').show('slow');
          $('#success').hide('slow');
          
          
         });
        
        $('#pack_size').change(function(){

          $('#quantity_div').show('slow');
         });
         

        
        });

        </script>

@endsection






