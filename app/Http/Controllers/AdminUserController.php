<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view('admin.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        Role::create($request->post());

        return redirect()->route('admin.index')->with('success','Role has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       

        
    }
    public function addrole(Request $request, string $id){
        
        if(is_numeric($request->role)){
        $data = new RoleUser();
        $data->user_id= $id;
        $data->role_id= $request->role;
        $data->save();
        return redirect()->route('admin.index')->with('success','Role Has Been added successfully');
        }
        return redirect()->route('admin.index')->with('error','Error');
        

    }

    public function deleterole(string $id){
        $user = User::find($id);
        return view('admin.deleterole',compact('user'));
    }
    

    
    public function destroyrole(Request $request, string $id)
    {
        $role= RoleUser::where('role_id',$request->role)->where('user_id',$id);
        $role->delete();
        return redirect()->route('admin.index')->with('success','Role has been deleted successfully');
    }

    public function destroy(string $id)
    {
        
    }
}
