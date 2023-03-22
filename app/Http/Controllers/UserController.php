<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function append()
    {
        $user = User::find(1);
        $fullname = $user->name. ' ' .$user->email;
        $user->append($fullname);
        dd($user->fullname);
    }

    public function contains()
    {
        $users = User::all();
        if($users->contains('name','anhcanh'))
        {
            echo "cơ sở dữ liệu tồn tại người dùng có tên anhcanh";
        } else {
            echo "cơ sở dữ liệu không tồn tại người dùng trên";
        }
    }

    public function diff()
    {
        $collection1 = collect([1,2,3,4,5]);
        $collection2 = collect([2,3,6]);
        $diff = $collection1->diff($collection2);
        echo $diff;
    }

    public function except()
    {
        $users = User::all();
        $users_new = $users->except([1,2]);
        dd($users_new);
    }

    public function fresh()
    {
        $user = User::find(1);
        $user->fresh();
        dd($user);
    }

    public function intersect()
    {
        $users = new User();
        $users = $users->intersect(User::whereIn('id', [1,2,3])->get());
    }

    public function load ()
    {
        $users = User::all()->load('posts');
        dd($users);
    }

    public function modelKey()
    {
        $user = User::all();
        dd($user->modelKeys());
    }

    public function makeVisible ()
    {
        $user = User::find(1);
        dd($user->makeVisible(['password']));
    }

    public function only ()
    {
        $user = User::all();
        dd($user->only([1,2]));
    }

    public function toQuery ()
    {
        $user = User::where('name', 'hao')->get();
        $user->toQuery()->update([
            'name' => 'haohim',
        ]);
    }

    public function unique ()
    {
        $user = User::all();
        dd($user->unique('name'));
    }

    public function replicate ()
    {
        $user = User::find(1);
        $new_user = $user->replicate();
        $new_user->name = 'anh';
        $new_user->save();
        dd($new_user);
    }
}
