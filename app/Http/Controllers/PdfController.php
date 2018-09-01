<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use PDF;
class PdfController extends Controller
{
    public function index(){

        date_default_timezone_set('Asia/Dhaka');

        $Products = Product::orderBy('id')->get();

        $pdf = PDF::loadView('test', compact('Products'));
        return $pdf->download('Product_List_'.date('d-M-Y').'.pdf');
    }


}
