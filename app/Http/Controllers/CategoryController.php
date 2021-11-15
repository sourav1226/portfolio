<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class CategoryController extends Controller
{
   
    public function index()

    {
        $categories= Category::select('id','name')->paginate(5);
        return view('categories.list')->with([
            'categories'=> $categories
        ]); 
    }

    public function create()
    {
        return view('categories.add');
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories'
            
        ]);
        try {
            DB::beginTransaction();

            // 
            $creat_category=Category::create([
                'name' => $request->name
              
            ]);
             if(!$creat_category){
                DB::rollBack();
                return back()->with('error','Something Went Wrong While Saving');
            }

            DB::commit();
            return redirect()->route('categories.index')->with('success', 'Category Stored Successfully');
        
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
       
    }

 
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
         $category= Category::whereId($id)->first();
         if(!$category){
             return back()->with('error', 'Category Not Found');

         }

         return view('categories.edit')->with([
             'category'=> $category
         ]);
    }

 
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories'
            
           
        ]);
        try {
            DB::beginTransaction();

            // 
            $update_category=Category::where('id' ,  $id)->update([
                'name' => $request->name
            
                
            ]);
             if(!$update_category){
                DB::rollBack();
                return back()->with('error','Something Went Wrong While Update');
            }

            DB::commit();
            return redirect()->route('categories.index')->with('success', 'Category Updated Successfully');
        
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

  
    public function destroy($id)
    {
       try {
          DB::beginTransaction();
          $delete_category= Category::whereId($id)->delete();
          if(!$delete_category){
              DB:rollBack();
              return back()->with('error', 'Something Went Wrong While Deleting');
          }

          DB::commit();
          return redirect()->route('categories.index')->with('success', 'Category Delete Successfully');

       } catch (\Throwable $th) {
           DB::rollBack();
           throw $th;
       }
    }
}
