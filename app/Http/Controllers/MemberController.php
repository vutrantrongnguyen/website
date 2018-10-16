<?php

namespace App\Http\Controllers;

use App\Newspaper;
use App\User;
use Illuminate\Http\Request;
use Auth;

class MemberController extends Controller
{
    public function admin()
    {
        $users = User::all();
//        $users = Auth::user();
//        Auth::check();
        $admins = $users->where('admin', User::HIGH)->all();
        $members = $users->where('admin', User::LOW)->all();
        return view('newspapers.admin', compact('admins', 'members'));
    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->admin = $request->admin;
        $user->save();
        return redirect()->back();
    }
//    public function store( Request $request )
//    {
//        $user = Auth::user();
//        Auth::check();
//        $newspaper = new Newspaper();
//        $newspaper->title = $request->tieude;
//        $newspaper->content = $request->noidung;
//        $newspaper->save();
//        return redirect('/newspapers');
//    }
    public function destroy($id)
    {
        if (Auth::user()->admin == 1) {
            $currentmember = User::findOrFail($id);
            $currentmember->delete();
            return redirect('/admin/members');
        }
    }
}


