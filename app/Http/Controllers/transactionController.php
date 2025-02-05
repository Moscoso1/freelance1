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
    
    $historyData = []; // Initialize an array to hold the history data.
    
    foreach ($ids as $index => $id) {
        if (isset($quantities[$index]) && $quantities[$index] !== null) {
            $item = item::find($id);
    
            if ($item) {
                $quantity = (int) $quantities[$index];
                $itemPrice = (float) $prices[$index];
    
                // Get previous visit quantities and prices from session
                $previousVisitQuantity = session("item_{$id}_previous_quantity", 0);
                $previousVisitPrice = session("item_{$id}_previous_price", 0);
    
                // If there were previous quantities or prices saved in the session, apply them to the item
                if ($previousVisitQuantity > 0 && $previousVisitPrice > 0) {
                    $item->quantity += $previousVisitQuantity;
                    $item->price += $previousVisitPrice;
    
                    // Forget the session values after they are applied
                    session()->forget("item_{$id}_previous_quantity");
                    session()->forget("item_{$id}_previous_price");
                }
    
                // Subtract the quantities and prices as per the current purchase
                $newQuantity = $item->quantity - $quantity;
                $newPrice = $item->price - $itemPrice;
    
                // Prevent negative values for quantity and price
                if ($newQuantity < 0) {
                    $newQuantity = 0;
                }
                if ($newPrice < 0) {
                    $newPrice = 0;
                }
    
                // Update the item with the new values
                $item->quantity = $newQuantity;
                $item->price = $newPrice;
    
                // Save the item after updates
                $item->save();
    
                // Store history data for bulk insert later
                $historyData[] = [
                    'item' => $item->id,
                    'price' => $itemPrice,
                    'quantity' => $quantity,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
    
                // Save the current quantity and price in the session for the next visit
                session(["item_{$id}_previous_quantity" => $quantity]);
                session(["item_{$id}_previous_price" => $itemPrice]);
            }
        }
    }
    
    // Bulk insert the history records if there are any
    if (!empty($historyData)) {
        History::insert($historyData);
    }
    return redirect()->back()->with('success', 'Purchased successfully!');
    
   }
   public function clear_session(Request $request){
    session()->flush();
    return redirect()->back()->with('m', 'Save successfully!,');
   }
   }

