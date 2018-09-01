@extends('layouts.app')
@section('content')


{{--  modal  --}}


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-centered" id="modal-title">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


          <table id="myTable" class="table table-light table-striped" style="text-align:center">
             
              <tr>
              <th >Product Name</th>
              <td class="name" id="name">name</td>
              </tr>

              <tr>
              <th >size</th>
              <td class="size" id="size">size</td>
              </tr>
               

              <tr>
              <th >Available Quantity</th>
              <td class="quantity" id="quantity">quantity</td>
              </tr>

              <tr>
                  <th >Product Added</th>
                  <td class="added" id="added">Product Added</td>
                  </tr>
              

              <tr>
                  <th >Last Updated</th>
                  <td class="update" id="update">Last updated</td>
                  </tr>
              </table>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

{{--  modal  --}}

        
<div class="container-fluid h-100" >
                       

        {{-- removedivstarts --}}
        
                <div id="remove_form" name='remove_form'>
                <h2 style="text-align: center">Product Data</h2>

<input type="text" id="myInput" placeholder="Search for Product Names" title="Type in a name">

<table id="myTable" class="table table-dark table-striped" style="text-align:center">
<tr class="header">
<th>Product</th>
<th>Pack size</th>
<th>Available Units</th>
<th>Action</th>


</tr>
@foreach($Products as $Product)
                <tr>
                <td>{{$Product->name}}</td>
                <td>{{$Product->pack_size.' '.$Product->size_in}}</td>
                <td>{{$Product->quantity}} pieces</td>
                <td> <!-- Button trigger modal -->
                  
                  <button type="button" class="btn btn-primary" data-toggle="modal" 
                  data-target="#exampleModal" data-name="{{$Product->name}}" data-size="{{$Product->pack_size.' '.$Product->size_in}}" data-quantity="{{$Product->quantity}} pieces"data-added={{$Product->created_at}} data-update={{$Product->updated_at}}>
                    view
                  </button>
                </td>
                </tr>
        @endforeach
</table>
<a href="{{route('pdf.index')}}"><button type="button" class="btn btn-dark float-right">Download a Copy</button></a>  
<br>
</div>
</div>



<script>


$(document).ready(function(){




  $('#myInput').keyup(function(){
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

    
  });

  $('#exampleModal').on('show.bs.modal', function (event) {
    
    var button = $(event.relatedTarget) // Button that triggered the modal
    var name = button.data('name') // Extract info from data-* attributes
    var size = button.data('size') // Extract info from data-* attributes
    var quantity = button.data('quantity') // Extract info from data-* attributes
    var added = button.data('added') // Extract info from data-* attributes
    var update = button.data('update') // Extract info from data-* attributes
     // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text(name)
   // modal.find('.modal-body input').val(info)

    modal.find('#name').html(name);
    modal.find('#size').html(size)
    modal.find('#quantity').html(quantity);
    modal.find('#added').html(added);
    modal.find('#update').html(update);
 

   
  })

});



</script>


@endsection