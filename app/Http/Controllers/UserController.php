<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = User::all();
        $list_level = ['SuperAdmin', 'Teacher'];
        $list_gender = ['Laki Laki', 'Perempuan'];

        return view('pages.user.index', [
            'items' => $items,
            'list_level' => $list_level,
            'list_gender' => $list_gender
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request['password']);

        $check_email = User::where('email', $data['email'])->first();
        if ($check_email) {
            return redirect()->back()->with('error', 'Email sudah terdaftar');
        }

        $check_uid = User::where('uid', $data['uid'])->first();
        if ($check_uid) {
            return redirect()->back()->with('error', ' sudah terdaftar');
        }

        User::create($data);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        if ($data['password'] == '') {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        $item = User::findOrFail($id);

        if ($item->email != $data['email']) {
            $check_email = User::where('email', $data['email'])->first();
            if ($check_email) {
                return redirect()->back()->with('error', 'Email sudah terdaftar');
            }
        }

        if ($item->uid != $data['uid']) {
            $check_uid = User::where('uid', $data['uid'])->first();
            if ($check_uid) {
                return redirect()->back()->with('error', 'Username sudah terdaftar');
            }
        }

        $item->update($data);
        return redirect()->back()->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = User::findOrFail($id);
        $item->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
