<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $users= User::select('id','email','name')->get();
        return view('users.list')->with([
            'users'=> $users
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required'
        ]);
        try {
            DB::beginTransaction();

            // 
            $creat_user=User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
             if(!$creat_user){
                DB::rollBack();
                return back()->with('error','Something Went Wrong While Saving');
            }

            DB::commit();
            return redirect()->route('users.index')->with('success', 'User Stored Successfully');
        
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $user= User::whereId($id)->first();
         if(!$user){
             return back()->with('error', 'User Not Found');

         }

         return view('users.edit')->with([
             'user'=> $user
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
           
        ]);
        try {
            DB::beginTransaction();

            // 
            $update_user=User::where('id' ,  $id)->update([
                'name' => $request->name,
                'email' => $request->email
                
            ]);
             if(!$update_user){
                DB::rollBack();
                return back()->with('error','Something Went Wrong While Update');
            }

            DB::commit();
            return redirect()->route('users.index')->with('success', 'User Updated Successfully');
        
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       try {
          DB::beginTransaction();
          $delete_user= User::whereId($id)->delete();
          if(!$delete_user){
              DB:rollBack();
              return back()->with('error', 'Something Went Wrong While Deleting');
          }

          DB::commit();
          return redirect()->route('users.index')->with('success', 'User Delete Successfully');

       } catch (\Throwable $th) {
           DB::rollBack();
           throw $th;
       }
    }
}
