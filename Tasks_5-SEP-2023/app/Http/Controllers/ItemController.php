<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    
    public function index()
    {
        $items = Item::all();
        // dd($items);
        return view('Item.index', compact('items'));
    }

    public function itemtable()
    {
        $items = Item::all();
        // dd($categories);
        return view('Item.itemtable', compact('items'));
    }

    
    public function create()
    {
        $categories = Category::all();
        return view('Item.create', compact('categories'));
    }

    
    public function store(Request $request)
    {
        $relativeImagePath = null; // Initialize relativeImagePath as null

        $newImageName = uniqid() . '-' . $request->addedCategoryName . '.' . $request->file('image')->extension();
        $relativeImagePath = 'assets/images/' . $newImageName;
        $request->file('image')->move(public_path('assets/images'), $newImageName);
    
        $categoryName = $request->input('category_name');
        $category = Category::where('name', $categoryName)->first(); // Retrieve the category by name
        $category_id = $category ? $category->id : 0; // Get the category ID or null if not found

        //When we use create() method we don't need to make a call to the save() method because that will be done at the end of Post model it self  
        $item = Item::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'category_id' => $category_id,
            'image' => $relativeImagePath,
        ]);
        // dd($category);

        return redirect(route('Item.itemtable'));
    }

    public function show(Item $item)
    {
        //
    }

    public function edit($id)
    {
        $data = Item::where('id', $id)->first();

        return view('Item.edit', [
            'item' => Item::where('id', $id)->first()
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->except(['_token', '_method']);

        // Check if a new image was uploaded
        if ($request->hasFile('image')) {
            $newImage = $this->storeImage($request);

            // Update the image column only if a new image was uploaded
            $data['image'] = $newImage;
        }

        Item::where('id', $id)->update($data);

        return redirect(route('Item.itemtable'));
    }

    public function destroy($id)
    {
        Item::destroy($id);

        return redirect(route('Item.itemtable'))->with('message', 'Product has been Deleted');
    }

    public function storeImage($request)
    {
        $newImageName = uniqid() . '-' . $request->addedCategoryName . '.' . $request->file('image')->extension();
        $relativeImagePath = 'assets/images/' . $newImageName;
        $request->file('image')->move(public_path('assets/images'), $newImageName);
    
        $categoryName = $request->input('category_name');
        $category = Category::where('name', $categoryName)->first(); // Retrieve the category by name
        $category_id = $category ? $category->id : 0;
        
        return $relativeImagePath;

    }
}
