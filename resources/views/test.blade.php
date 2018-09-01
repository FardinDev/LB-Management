<!DOCTYPE html>
<html>
    <div style="display: none">
            {{date_default_timezone_set('Asia/Dhaka')}}
    </div>
<head>
    <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
    h1, h5 {
        text-align: center;
    }


    </style>

    


</head>
<body>

   
    <h1>Product List</h1>
    <h5>Date: {{date('d-M-Y')}} </h6>
    <br><br>
    <table style="text-align:center">
            <tr class="header">
                    <th >Product</th>
                    <th>Pack size</th>
                    <th>Available Units</th>                    
            </tr>
    @foreach($Products as $Product)
    
    
                <tr>
                <td>{{$Product->name}}</td>
                <td>{{$Product->pack_size.' '.$Product->size_in}}</td>
                <td>{{$Product->quantity}}
                    
                    @if($Product->quantity > 1)
                    
                    pieces
                
                    @else

                    piece

                    @endif
                </td>
                </tr>
    @endforeach
    </table>
    <br><br><br>
    <hr width="50%">

    


</body>
</html>