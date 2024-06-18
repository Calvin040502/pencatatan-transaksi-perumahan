<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class ManageUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.manage-users.index',[
            'users' => User::get(),
            'roles' => Role::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    return view('dashboard.manage-users.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:6',
    ]);

    User::create([
        'name' => $request->input('name'),
        'username' => $request->input('username'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
    ]);

    return redirect('/manage-users')->with('success', 'User successfully created');
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
        $user = User::findOrFail($id);
        return view('dashboard.manage-users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        try {
            // Validasi data yang masuk dari formulir
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
        ]);

        // Ambil data admin yang akan diubah
        $user = User::find($id);

        // Update data sesuai dengan input yang diterima
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');

        // Jika password diisi, maka hash dan simpan password baru
        if ($request->filled('old_password')) {
            // Check if old password matches
            if (!Hash::check($request->input('old_password'), $user->password)) {
                return redirect()->back()->with('error', 'Old password is incorrect.');
            }
    
            // Hash and update the new password
            $user->password = Hash::make($request->input('new_password'));
        }

        $user->save();
        
        return redirect('/manage-users')->with('success', 'Akun berhasil diperbarui.');
        } catch (\Throwable $th) {
            return redirect('/manage-users')->with('error', 'Akun gagal diperbarui.');
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/manage-users')->with('success', 'User deleted successfully');
    }

    public function addRole(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        return view('dashboard.manage-users.roles.add-role',[
            'roles' => Role::get(),
            'user' => $user,
        ]);
    }

    public function assignRole(Request $request, $userId)
    {
        // Logging untuk memastikan userId yang diterima
        \Log::info('Assigning role to userId: ' . $userId);

        $user = User::findOrFail($userId);

        // Logging untuk memastikan user yang diambil dari database
        \Log::info('User found: ' . $user->id . ' - ' . $user->email);

        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);

        // Logging untuk memastikan role yang diterima
        \Log::info('Role to be assigned: ' . $request->input('role'));

        $role = Role::where('name', $request->input('role'))->firstOrFail();
        $user->assignRole($role);

        return redirect('/manage-users')->with('success', 'Role successfully added!');
    }

    public function removeRole(Request $request, $userId)
    {
        // Logging untuk memastikan userId yang diterima
        \Log::info('Removing role from userId: ' . $userId);

        $user = User::findOrFail($userId);

        // Logging untuk memastikan user yang diambil dari database
        \Log::info('User found: ' . $user->id . ' - ' . $user->email);

        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);

        // Logging untuk memastikan role yang diterima
        \Log::info('Role to be removed: ' . $request->input('role'));

        $role = Role::where('name', $request->input('role'))->firstOrFail();
        $user->removeRole($role);

        return redirect('/manage-users')->with('success', 'Role successfully removed!');
    }

}
