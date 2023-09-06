<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        // dd($categories);
        return view('Category.index', compact('categories'));
    }

    public function categorytable()
    {
        $categories = Category::all();
        // dd($categories);
        return view('Category.categorytable', compact('categories'));
    }

    public function create()
    {
        return view('Category.create');
    }

    public function store(Request $request)
    {
        //Create new instance of post model class
        // $category = new Category();
        // $category->name = $request->addedCateroryName;
        // $category->desc = $request->addedCateroryDesc;
        // $category->image = 'emptty';
        
        // // //save method
        // $category->save();

        /********************Validation Data********************/
        
        //if all these rules have been passed -> a new row will be created
        // $request->validate([
        //     //1. Apply the pipe (|) syntax after every rule
        //     'name' => 'required|unique:categories|max:255', //categories : table name
        //     'desc' => 'required',
        //     'image' => ['required', 'mimes:jpg,png,jpeg', 'max:5048'], //'image' : name in the form (name="image") not in the DB
        // ]);

        // $request->validate([
        //     'name' => 'required|unique:categories,name|max:255',
        //     'desc' => 'required',
        //     'image' => 'required|image|mimes:jpg,png,jpeg|max:5048',
        // ]);

        //if the data is invalid -> a validation exception will be thrown with instruction of what went wrong 
        
        /*-----------------------------------------------------*/

        $relativeImagePath = null; // Initialize relativeImagePath as null

        $newImageName = uniqid() . '-' . $request->addedCategoryName . '.' . $request->file('image')->extension();
        $relativeImagePath = 'assets/images/' . $newImageName;
        $request->file('image')->move(public_path('assets/images'), $newImageName);
    
        //When we use create() method we don't need to make a call to the save() method because that will be done at the end of Post model it self  
        $category = Category::create([
            'name' => $request->input('addedCateroryName'),
            'desc' => $request->input('addedCateroryDesc'),
            'image_path' => $relativeImagePath,
        ]);
        // dd($category);

        return redirect(route('Category.categorytable'));
    }

    public function show($id)
    {
        $categoryItems = Item::where('category_id', $id)->get();
        // dd($categoryItems);
        return view('Category.show', compact('categoryItems'));
    }

    public function edit($id)
    {
        return view('Category.edit', [
            'category' => Category::where('id', $id)->first()
        ]);
    }

    public function update(Request $request, $id)
    {
        Category::where('id', $id)->update($request->except([
            '_token', '_method'
        ]));

        return redirect(route('Category.categorytable'));
    }

    public function destroy($id)
    {
        Category::destroy($id);

        return redirect(route('Category.categorytable'))->with('message', 'Product has been Deleted');
    }

}
