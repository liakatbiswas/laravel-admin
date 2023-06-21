<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

        $notification = [
            'message' => 'User Logout Successfully.',
            'alert-type' => 'success',
        ];

        return redirect('/login')->with($notification);
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

        $notification = [
            'message' => 'Admin Profile Updated Successfully.',
            'alert-type' => 'info',
        ];

        return redirect()->route('admin.profile')->with($notification);
    } //  End Method

    public function changePassword()
    {
        return view('admin.profile.change-password');
    } //  End Method

    public function updatePassword(Request $request)
    {
        $validate = $request->validate([
            'old_pass' => 'required',
            'new_pass' => 'required',
            'confirm_pass' => 'required|same:new_pass',
        ]);

        $hashedPass = Auth::user()->password;
        if (Hash::check($request->old_pass, $hashedPass)) {
            $users = User::find(Auth::id());

            $users->password = bcrypt($request->new_pass);
            $users->save();

            session()->flash('message', 'Password Successfully Updated');
            return redirect()->back();
        } else {
            session()->flash('message', 'Old Password does not Matched.');
            return redirect()->back();
        }

    } // end method
}
