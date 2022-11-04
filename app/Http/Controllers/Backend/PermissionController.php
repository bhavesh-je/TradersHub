<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use DB;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $permissions = Permission::orderBy('id', 'desc')->get();
        return view('Backend.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Backend.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request, [
            'name' => 'required|regex:/^[A-Za-z0-9-]+$/|unique:permissions,name',
        ],
        [
            'name.required' => 'Please enter permission name.',
            'name.regex' => 'Please enter permission name with dash.',
            'name.unique' => 'Permission name has already been taken.',
        ]);

        $permission = [
            'name' => $request->name,
            'guard_name' => 'web',
        ];

        Permission::create($permission);

        return redirect()->route('permissions.index')->with('success','Permission created successfully');
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
        //
        $permission = Permission::findOrFail($id);
        return view('Backend.permissions.edit', compact('permission'));

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
        //
        $this->validate($request, [
            'name' => 'required|regex:/^[A-Za-z0-9-]+$/|unique:permissions,name',
        ],
        [
            'name.required' => 'Please enter permission name',
            'name.regex' => 'Please enter permission name with dash',
            'name.unique' => 'Permission name has already been taken',
        ]);

        $permission = [
            'name' => $request->name,
        ];

        Permission::where('id', $id)->update($permission);

        return redirect()->route('permissions.index')->with('success','Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Permission::where('id', $id)->delete();
        return redirect()->route('permissions.index')->with('success','Permission deleted successfully');
    }
}
