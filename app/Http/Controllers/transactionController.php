<?php

namespace App\Http\Controllers;
use App\Models\item;
use Illuminate\Http\Request;

class transactionController extends Controller
{
   public function purchase(){
      $purchase = "null";
      $datas= item::all();
   return view('purchase.purchase', compact('purchase','datas'));
   }
   public function subtract(Request $request){

$data = $request->all();
$ids = $data['id']; 
$quantities = $data['quantity']; 
$prices = $data['price'];

foreach ($ids as $index => $id) {
   
    if (isset($quantities[$index]) && $quantities[$index] !== null) {
     
       
        $item = item::find($id);

        if ($item) {
           
            $quantity = (int) $quantities[$index];
            $itemPrice = (float) $prices[$index];  

            $previousVisitQuantity = session("item_{$id}_previous_quantity", 0); 
            $previousVisitPrice = session("item_{$id}_previous_price", 0); 

            if ($previousVisitQuantity > 0 && $previousVisitPrice > 0) {
             
                $item->quantity += $previousVisitQuantity;
                $item->price += $previousVisitPrice;

                session()->forget("item_{$id}_previous_quantity");
                session()->forget("item_{$id}_previous_price");
            }

            $newQuantity = $item->quantity - $quantity;
            $newPrice = $item->price - $itemPrice;

            if ($newQuantity < 0) {
                $newQuantity = 0;  
            }
            if ($newPrice < 0) {
                $newPrice = 0;  
            }

            $item->quantity = $newQuantity;
            $item->price = $newPrice;

            $item->save();

            session(["item_{$id}_previous_quantity" => $quantity]);
            session(["item_{$id}_previous_price" => $itemPrice]);
        }
    }
return redirect()->back()->with('success', 'Purchased successfully!');
}
   }

   public function clear_session(Request $request){
    session()->flush();
    return redirect()->back()->with('m', 'Save successfully!,');
   }
   }

