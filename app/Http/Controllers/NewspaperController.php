<?php

namespace App\Http\Controllers;

use App\Newspaper;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class NewspaperController extends Controller
{
    public function admin()
    {
        $user = User::all();
//        $user = Auth::user();
//        Auth::check();
        $admins = $user->where('admin', User::HIGH)->all();
        $members = $user->where('admin', User::LOW)->all();
        return view('newspapers.admin', compact('admins', 'members'));
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function all()
    {
        $newspapers = \App\Newspaper::latest()->paginate(6);
//        $newspapers = \App\Newspaper::latest()->get()->paginate(3);
        return view('welcome', compact('newspapers'));
    }

    public function show($id)
    {
        $user = User::all();
        //$newspaper =DB::table('newspapers')->find($id);
        $newspaper = Newspaper::find($id);
        return view('newspapers.show', compact('newspaper', 'user'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        Auth::check();
        $newspaper = new Newspaper();
        $newspaper->title = $request->tieude;
        $newspaper->content = $request->noidung;
        $newspaper->user_id = $user->id;
        $newspaper->save();
        return redirect('/newspapers');
    }

    public function create()
    {
        return view('newspapers.create');
    }

    public function destroy($newspaper)
    {
        if (Auth::user()->admin == 1) {
            $currentNewspaper = Newspaper::findOrFail($newspaper);
            $currentNewspaper->delete();
        }
        return redirect('/newspapers');
    }

    public function search(Request $request)
    {
        $searchNewspaper = Newspaper::where('content', 'like', '%'.$request->search.'%')->get();
//     print_r($searchNewspaper);
        return view('newspapers.search',compact('searchNewspaper'));
    }

    public function edit($id)
    {
        $incorrectNewspaper = Newspaper::find($id);
        return view('newspapers.edit',compact('incorrectNewspaper'));
    }

    public function update($id,Request $request)
    {
        $user = Auth::user();

        $incorrectNewspaper = Newspaper::findOrFail($id);
        //check user da tao bai

        $incorrectNewspaper->title = $request->tieude;
        $incorrectNewspaper->content = $request->noidung;
        //$incorrectNewspaper->user_id = $user->id;
        $incorrectNewspaper->save();
        return redirect('/newspapers');
    }
}


