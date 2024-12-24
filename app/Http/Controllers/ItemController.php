<?php

namespace App\Http\Controllers;
use App\Models\item;
use App\Models\category;
use Illuminate\Http\Request;
use DB;
class ItemController extends Controller
{
  public function itemRead(){
    $items = item::all();
    $sumcat = category::count('category');
    $items = Item::whereNotNull('quantity')->get(); // Get all items with a quantity
    $total = $items->sum('quantity');
    $totalcat = item::distinct('category')->count('category');  
  
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
        $itemLowest = 'Empty!';
        $minQuantity = '';
    }

    $categoryCounts = Item::select('category', \DB::raw('count(*) as count'))
    ->groupBy('category')
    ->get()->toArray();

    return view('Home.dashboard', compact('item','totalcat','categoryCounts','total','maxQuantity','itemLowest','minQuantity','sumcat'));
  }
  public function addProduct(Request $request){
    $randomNumber = mt_rand(1000, 9999);
    $datas = item::all();
    $items = new item();
    $items->item = $request->input('item');
    $items->price = $request->input('price');
    $items->category = $request->input('category');
    $items->quantity = $request->input('quantity');
    $items->barcode = ($randomNumber);
    $items->save();
    return redirect()->back()->with('success', 'Save successfully!');

  }
  public function editRead(Request $request, $id){
  
    $editdatas = item::findOrfail($id);
    $datas = item::all();
    $category =category::all();
    return view('product.product', compact('editdatas','datas','category'));
} public function saveUpdate(Request $request, $id){
    session()->flush();
    $item = item::findOrfail($id);
    $item->item = $request->input('item');
    $item->price = $request->input('price');
    $item->category = $request->input('category');
    $item->quantity = $request->input('quantity');
    $item->barcode = $request->input('barcode');
    $item->save();

    return redirect()->back()->with('success', 'Updated successfully!');
}
 public function delete($id){
    $deletedatas = Item::find($id);

    if ($deletedatas) {
        $deletedatas = Item::find($id);

if ($deletedatas) {

    $deletedatas->delete();
    DB::statement('SET @count = 0');
    DB::statement('UPDATE item_db SET id = @count := (@count + 1)');
    DB::statement('ALTER TABLE item_db AUTO_INCREMENT = 1');

    return response()->json(['status' => 200, 'id' => $id]);
}
return response()->json(['status' => 404, 'message' => 'Item not found']);
        }
    }
   public function addCategory(Request $request){
     
    $addcat=new category();
    $addcat->category=$request->input('category');
    $addcat->save();
    return redirect()->back()->with('success', 'new category successfully added!');
   }
}
