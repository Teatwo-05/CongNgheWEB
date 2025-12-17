<?php

namespace App\Http\Controllers;
use App\Models\Userth;
use Illuminate\Http\Request;

class UserthController extends Controller
{
    public function index()
    {
        $users = Userth::paginate(10);
        return view('users.index', compact('users'));
    }
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:userths,email',
            'password' => 'required|string|min:6',
            'role' => 'required|in:admin,user,moderator',
        ]);

        Userth::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'Thành công tạo người dùng mới.');
    }
    public function edit($id)
    {
        $user = Userth::findOrFail($id);
        return view('users.edit', compact('user'));
    }
     public function update(Request $request, $id)
    {
        $user = Userth::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'username' => 'required|max:50|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:admin,teacher,student'
        ]);

        $data = $request->only(['username', 'email', 'role']);
        
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')
            ->with('success', 'Cập nhật người dùng thành công!');
    }
     public function destroy($id)
    {
        $user = Userth::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Xóa người dùng thành công!');
    }
}