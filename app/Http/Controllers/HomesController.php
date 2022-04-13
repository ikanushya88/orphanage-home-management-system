<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Models\Home;
use App\Models\User;
use Illuminate\Http\Request;

class HomesController extends Controller
{
    public function create() {
        
    }

    public function accept($home) {
        auth()->user()->homes()->where('home_id', $home)->update(['home_user.status' => 'approved']);
        return back()->withErrors(['success' => 'Invitation accepted successfully']);
    }

    public function reject($home) {
        auth()->user()->homes()->where('home_id', $home)->update(['home_user.status' => 'rejected']);
        return back()->withErrors(['success' => 'Invitation rejected successfully']);
    }

    public function deleteFeed($id) {
        $feed = Feed::find($id);
        if(auth()->id() == $feed->user_id) {
            $feed->update(['type' => 'deleted']);
            return back()->withErrors(['success' => 'Deleted Successfully']);
        }
        return back()->withErrors(['error' => 'Permission denied']);
    }

    public function removeAdmin($admin, $home) {
        if (auth()->user()->homes()->where('home_id', $home)->count()) {
            User::find($admin)->homes()->where('home_id', $home)->update(['home_user.status' => 'removed by '.auth()->user()->name.' ('.auth()->id().')']);
            return back()->withErrors(['success' => 'Removed Successfully']);
        }
        return back()->withErrors(['error' => 'Permission denied']);
    }

    public function addAdmin($admin, $home) {
        if (auth()->user()->homes()->where('home_id', $home)->count()) {
            $u = User::where('email', $admin);
            if ($u) {
                $user = $u->first();
                if ($user->homes()->where('home_id', $home)->whereIn('home_user.status', ['invited', 'approved'])->count()) {
                    return back()->withErrors(['error' => 'User already an admin or invited']);
                } else {
                    $user->homes()->save(Home::find($home), ['status' => 'invited']);
                    return back()->withErrors(['success' => 'User invited']);
                }
            }
            
            return back()->withErrors(['error' => 'User not found']);
        }
        return back()->withErrors(['error' => 'Permission denied']);
    }
}
