<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:users-read|users-create|users-update|users-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:users-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:users-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:users-delete', ['only' => ['destroy']]);
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
        if (request()->get('type') == "json") {
            foreach (User::all() as $item) {
                $results[$index] = $item;
                $results[$index]["encryptid"] = encrypt($item->id);
                $item->roles->pluck('name', 'name')->first();
                $index++;
            }
            return response()->json($results);
        }

        return view('admin.pages.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('admin.pages.users.create', compact('roles'));
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:8|confirmed',
            'roles' => 'required',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        $user->assignRole($request->input('roles'));

        return redirect()->route("admin.users.edit", encrypt($user->id))
            ->with('success', 'Tambah data user berhasil.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find(decrypt($id));
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name')->all();

        return view('admin.pages.users.edit', compact('user', 'roles', 'userRole'));
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . decrypt($id),
            'username' => 'required|unique:users,username,' . decrypt($id),
            'password' => 'confirmed',
            'roles' => 'required',
        ]);

        $data = $request->all();
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data = Arr::except($data, array('password'));
        }

        $user = User::find(decrypt($id));
        $user->update($data);

        DB::table('model_has_roles')->where('model_id', decrypt($id))->delete();
        $user->assignRole($request->input('roles'));

        return redirect()->back()
            ->with('success', 'Ubah data user berhasil.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find(decrypt($id));
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Hapus data user berhasil.');
    }

    /**
     * Remove the resource selected from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bulk_destroy()
    {
        $ids = json_decode(request()->ids);
        foreach ($ids as $id) {
            $data = User::find($id->id);
            $data->delete();
        }
        return redirect()->back()
            ->with('success', 'Hapus data user berhasil.');
    }
}
