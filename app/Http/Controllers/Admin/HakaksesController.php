<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HakaksesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:hak-akses-read|hak-akses-create|hak-akses-update|hak-akses-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:hak-akses-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:hak-akses-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:hak-akses-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = 0;
        $results = [];
        if (request()->get('type') == 'json') {
            foreach (Role::all() as $role) {
                $results[$index] = $role;
                $results[$index]["encryptid"] = encrypt($role->id);
                $index++;
            }
            return response()->json($results);
        }

        return view('admin.pages.users.hak-akses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = [];
        $index = 0;
        $data = Permission::where('parent_id', '=', null)->orderBy('name', 'ASC')->get();
        foreach ($data as $item) {
            $permissions[$index] = $item;
            $permissions[$index]["create"] = Permission::where('parent_id', '=', $item->id)->where('name', 'like', '%create')->first();
            $permissions[$index]["update"] = Permission::where('parent_id', '=', $item->id)->where('name', 'like', '%update')->first();
            $permissions[$index]["delete"] = Permission::where('parent_id', '=', $item->id)->where('name', 'like', '%delete')->first();
            $index++;
        }
        return view('admin.pages.users.hak-akses.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permission);

        return redirect()->route('admin.hak-akses.edit', encrypt($role->id))
            ->with('success', 'Tambah hak akses berhasil.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = [];

        $index = 0;
        $data = Permission::where('parent_id', '=', null)->orderBy('name', 'ASC')->get();
        foreach ($data as $item) {
            $permissions[$index] = $item;
            $permissions[$index]["create"] = Permission::where('parent_id', '=', $item->id)->where('name', 'like', '%create')->first();
            $permissions[$index]["update"] = Permission::where('parent_id', '=', $item->id)->where('name', 'like', '%update')->first();
            $permissions[$index]["delete"] = Permission::where('parent_id', '=', $item->id)->where('name', 'like', '%delete')->first();
            $index++;
        }

        $role = Role::find(decrypt($id));
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", decrypt($id))
            ->pluck('role_has_permissions.permission_id')
            ->all();

        return view('admin.pages.users.hak-akses.edit', compact('permissions', 'role', 'rolePermissions'));
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
        $this->validate($request, [
            'name' => 'required|unique:roles,name,' . decrypt($id),
            'permission' => 'required',
        ]);

        $role = Role::find(decrypt($id));
        $role->name = $request->name;
        $role->save();

        $role->syncPermissions($request->permission);

        return redirect()->back()
            ->with('success', 'Ubah hak akses berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find(decrypt($id));
        $role->delete();

        return redirect()->route('admin.hak-akses.index')
            ->with('success', 'Hapus hak akses berhasil!');
    }

    /**
     * Remove the resource selected from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bulk_destroy()
    {
        $roles = json_decode(request()->ids);
        foreach ($roles as $role) {
            $data = Role::find($role->id);
            $data->delete();
        }
        return redirect()->back()
            ->with('success', 'Hapus hak akses berhasil');
    }
}
