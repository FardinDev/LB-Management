<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $ProductNames = Product::groupBy('name')->orderBy('id')->get();

        $Products = Product::orderBy('id')->get();


        return view('add')->with([
            'ProductNames' => $ProductNames,
            'Products' => $Products,
        
        ]);
    }
// removepage

    public function remove()
    {
 
        $Products = Product::orderBy('id')->get();
        return view('remove')->with('Products', $Products);

    }


//home page

public function home()
{   $Products = Product::orderBy('id')->get();
    return view('welcome')->with('Products', $Products);
}

    //fetch data dynamically

   public function fetch(Request $request)
   {        

 
            $select = $request->get('select');
            $value = $request->get('value');
            $dependent = $request->get('dependent');
            $data = DB::table('products')
            ->where($select, $value)
            ->get();
            $output = '<option value="">Select Pack Size</option>';
            foreach($data as $row)
            {
            $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'';
            $output .= ' ';
            $output .= ''.$row->size_in.'</option>';
            
            }

            return response()->json(array('output'=> $output), 200);
            
   }


   //view
   public function show(Request $request)
   {        



           echo('abc');
            // $id = $request->get('id');
            
            // $data = DB::table('products')
            // ->where(id, $id)
            // ->get();

            // foreach($data as $row)
            // {
            
            //     $name = $data->name;
            //     $pack_size = $data->pack_size;
            
            // }

            // return response()->json(array('name'=> 'abs', 'pack_size' => '200'), 200);
            
   }
   //view

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $name = $request->name;
        $pack_size = $request->pack_size;
        $size_in = $request->size_in;
        $quantity = $request->quantity;


        DB::table('products')->insert(
            ['name' => $name, 
             'pack_size' => $pack_size,
             'size_in' => $size_in,
             'quantity' => $quantity,
             'created_at' => date("Y-m-d H:i:s"),
            ]);
            
            return redirect()->route('product.addNew')->with('success_message', 'New Product Successfully Added');
       



       
    }


    public function update(Request $request)
    {
        $products = product::where('name',  $request->name)
                            ->where('pack_size', $request->pack_size)
                            ->get();

                         foreach($products as $product){

                            product::where('id', $product->id)
                                    ->update(['quantity' =>($product->quantity+$request->quantity) ]);
                         

                         }
                        
                         if($request->quantity > 1){

                            $msg = '<h6>Successfully Added <span class="badge badge-success">'.$request->quantity.'</span> units <span class="badge badge-success">'.$request->pack_size.''.$product->size_in.'</span> pack of <span class="badge badge-success">'.$product->name.'</span></h6>';
                         }
                         else{
                            $msg = '<h6>Successfully Added <span class="badge badge-success">'.$request->quantity.'</span> unit <span class="badge badge-success">'.$request->pack_size.''.$product->size_in.'</span> pack of <span class="badge badge-success">'.$product->name.'</span></h6>';
                         }
                        
                         return redirect()->route('add')->with('success_message', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function empty($id)
    {
        product::where('id', $id)
                ->update(['quantity' => 0]);
        
        return redirect()->route('remove')->with('success_message', 'Product removed');

    }





    //remove

public function delete(Request $request)
            {   
            $newQuantity = $request->number;
            $id = (int)$request->id;
            $product = product::where('id', $id)->first();
            $oldQuantity = $product->quantity;


            if($oldQuantity>=$newQuantity){

            product::where('id', $id)
            ->update(['quantity' =>($oldQuantity-$newQuantity)]);

            return redirect()->route('remove')->with('success_message', 'Product removed');

            }
            else{

            return redirect()->route('remove')->with('error', 'Invalid');

            }


}






    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

// addNewProduct

public function addNew(){

return view('addNew');

}


// addNewProduct
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }




}
