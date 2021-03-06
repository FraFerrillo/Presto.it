<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }
    public function index()
    {
      $user = User::where('is_revisor', null)
      ->orderBy('Created_at', 'desc')
      ->first();
      return view('admin.home', compact('user'));

    }

    private function setAccepted($user_id, $value)
    {
        $user = User::find($user_id);
        $user->is_revisor = $value;
        $user->save();
        return redirect(route('admin.home'));
    }

    public function accept($user_id)
    {
        return $this->setAccepted($user_id, true);
    }
    public function reject($user_id)
    {
        return $this->setAccepted($user_id, false);
    }
    public function requestRevisor($user_id)
    {
        return $this->setAccepted($user_id, null);
    }
}
