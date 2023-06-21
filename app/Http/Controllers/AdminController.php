<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);

        return view('admin.profile.index', compact('adminData'));

    } // end method


    public function edit()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);

        return view('admin.profile.edit', compact('editData'));
    } //  End Method


    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if ($request->file('profile_img')) {
            $file = $request->file('profile_img');
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_img'), $fileName);
            $data['profile_img'] = $fileName;
        }
        $data->save();

        return redirect()->route('admin.profile');

    } //  End Method


}
