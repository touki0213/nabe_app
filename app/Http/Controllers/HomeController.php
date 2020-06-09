<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Nabe;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $auth = auth()->user();
        $nabe = $auth->nabes()->get();
        $count = $nabe->count();
        $first_three = preg_match("/^3/", (string)$count);
        $last_three = preg_match("/3$/", (string)$count);

        return view('home', compact('auth', 'nabe', 'count', 'last_three', 'first_three'));
    }

    public function nabe()
    {
        $auth = auth()->user();
        Nabe::create([
            'user_id' => $auth->id
        ]);

        return redirect()->back();
    }

    public function destory($id)
    {
        $user = User::find($id);
        $nabe = Nabe::where('user_id', $user->id);
        $nabe->delete();

        return redirect()->back();
    }
    
}
