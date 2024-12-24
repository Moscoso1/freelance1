<?php

namespace App\Http\Controllers;
use App\Models\item;
use App\Models\category;
use Illuminate\Http\Request;
use DB;

class purchaseController extends Controller
{
    public function product(){
        $product ='product';
        $datas = item::all();
      
        $category = category::all();
        return view('product.product', compact('datas','product','category'));
    }
    public function dashboard(){
        $sumcat = category::count('category');
        $items = Item::whereNotNull('quantity')->get(); // Get all items with a quantity
        $total = $items->sum('quantity');
        $totalcat = item::distinct('category')->count('category'); 
        $dashboard="null";

        //top item
        $row = DB::table('item_db')
        ->whereNotNull('quantity')
        ->orderByRaw('CAST(quantity AS UNSIGNED) DESC') 
        ->first();  
  
    if ($row && !empty($row->quantity) && !empty($row->item)) {
        $formattedQuantity = $row->quantity >= 1000000 ? number_format($row->quantity / 1000000, 1) . 'M' : 
        ($row->quantity >= 1000 ? number_format($row->quantity / 1000, 1) . 'K' : number_format($row->quantity));
    
        $item = $row->item;  
        $maxQuantity = $formattedQuantity; 
    } else {
        $item = 'empty!';
        $maxQuantity = '';
    }

        //bottom item
        $rowLowest = DB::table('item_db')
        ->whereNotNull('quantity')
        ->orderByRaw('CAST(quantity AS UNSIGNED) ASC') 
        ->first();  

        if ($rowLowest && !empty($rowLowest->quantity) && !empty($rowLowest->item)) {
            $formattedQuantityLowest = $rowLowest->quantity >= 1000000 ? number_format($rowLowest->quantity / 1000000, 1) . 'M' : 
            ($rowLowest->quantity >= 1000 ? number_format($rowLowest->quantity / 1000, 1) . 'K' : number_format($rowLowest->quantity));

            $itemLowest = $rowLowest->item;  
            $minQuantity = $formattedQuantityLowest; 
        } else {
            $itemLowest = 'empty!';
            $minQuantity = '';
        }
    
        $categoryCounts = Item::select('category', \DB::raw('count(*) as count'))
        ->groupBy('category')
        ->get()->toArray();

        return view('Home.dashboard', compact('totalcat','dashboard','total','maxQuantity','item','itemLowest','minQuantity','categoryCounts','sumcat'));
    }
}
