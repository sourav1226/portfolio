<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
   
    public function index()
    {
        $projects= Project::select('id','cat_id','name','url','description','image','status')->paginate(5);
        return view('projects.list')->with([
            'projects'=> $projects
        ]); 
    }
    
    public function create()
    {
        $categories= Category::all();
        return view('projects.add')->with([
            'categories'=>$categories
        ]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'cat_id' => 'required',
            'description' => 'required'
        ]);
        try {
            DB::beginTransaction();
        
            $creat_project=Project::create([
                'name' => $request->name,
                'cat_id' => $request->cat_id,
                'url' => $request->url,               
                'description' => $request->description,
                'status' => $request->status,
                'image' => $request->image
              
            ]);
            if(!$creat_project){
                DB::rollBack();
                return back()->with('error','Something Went Wrong While Saving');
            }

            DB::commit();
            return redirect()->route('projects.index')->with('success', 'Category Stored Successfully');
        
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        
    }

 
    public function show($id)
    {
        
    }

  
    public function edit($id)
    {

        $categories= Category::all();
        $project= Project::whereId($id)->first();
        if(!$project){
            return back()->with('error', 'User Not Found');

        }

        return view('projects.edit')->with([
            'categories'=>$categories,
            'project'=> $project
        ]);

       
      
   

      

    }


    public function update(Request $request, $id)
    {
        $request->validate([
         
            
           
        ]);
        try {
            DB::beginTransaction();

            // 
            $update_project= Project::where('id' ,  $id)->update([
                'name' => $request->name,
                'cat_id' => $request->cat_id,
                'url' => $request->url,               
                'description' => $request->description,
                'status' => $request->status,
                'image' => $request->image
            ]);

             if(!$update_project){
                DB::rollBack();
                return back()->with('error','Something Went Wrong While Update');
            }

            DB::commit();
            return redirect()->route('projects.index')->with('success', 'Category Updated Successfully');
        
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

 
    public function destroy($id)
    {
      
    }
}
