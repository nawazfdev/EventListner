<?php 
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductDiscount;
use Illuminate\Http\Request;
use App\Models\ProductData;

class ProductDataController extends Controller
{
   
    public function saveFormData(Request $request)
    {
        $data = $request->all();

        foreach ($data as $key => $value) {
            // Store each form field data in the database
            ProductData::create([
                'tab_name' => $request->input('tab_name'),
                'field_name' => $key,
                'field_value' => $value,
            ]);
        }

        return redirect()->route('product.form')->with('success', 'Form data saved successfully.');
    }
    public function saveProduct(Request $request)
{
    $data = $request->validate([
        'product_name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'category' => 'required|string',
        // Add validation rules for other product fields as needed
    ]);

    Product::create($data);

    return back()->with('success', 'Product saved successfully.');
}
// store discount
public function discountStore(Request $request)
{
    // // Validate the request data
    // $latestProductId = Product::latest()->first()->id;

    //  // Validate the request data
    //  $request->validate([
    //     'quantity' => 'required|integer',
    //     'priority' => 'required|integer',
    //     'price' => 'required|numeric',
    //     'date_start' => 'required|date',
    //     'date_end' => 'required|date|after:date_start',
    // ]);

    // // Get the product ID from the hidden field in the form
    // $productId = $request->input('product_id');

    // // Create a new ProductDiscount model for each row in the form
    // foreach ($request->input('quantity') as $index => $quantity) {
    //     $productDiscount = new ProductDiscount();

    //     // Set the product discount properties
    //     $productDiscount->product_id = $latestProductId;
    //     $productDiscount->quantity = $quantity;
    //     $productDiscount->priority = $request->input('priority')[$index];
    //     $productDiscount->price = $request->input('price')[$index];
    //     $productDiscount->date_start = $request->input('date_start')[$index];
    //     $productDiscount->date_end = $request->input('date_end')[$index];

    //     // Save the product discount to the database
    //     $productDiscount->save();
    // }

    // // Return a success response
    // return response()->json([
    //     'success' => true,
    // ]);
print_r($_POST);
}
}