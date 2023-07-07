<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function banUser(User $user)
    {
        $user->is_banned = true;
        $user->save();

        return redirect()->back()->with('success', 'User has been banned successfully.');
    }

    public function recallUser(User $user)
    {
        $user->is_banned = false;
        $user->save();

        return redirect()->back()->with('success', 'User has been recalled successfully.');
    }
}
