<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = (new User())->getAll();

        return view('admin.user.index',compact('users'));
    }
    public function create()
    {
        return view('admin.user.create');
    }
    public function store(StoreRequest $request)
    {
        $user=$request->all();
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            $user['avatar'] = $file->store('avatars', 'public');
        }
        User::create($user);

        return response('ok',200);
    }

    public function edit(User $user)
    {

        return view('admin.user.edit', compact('user'));
    }

        public function update(UpdateRequest $request, User $user)
    {
        $data = $request->only(['surname',
            'name',
            'patronymic',
            'email',
            'sex',
            'role',
            'address',
            'number',
            'password',
            'description',
            'avatar',

        ]);


        if(isset($data['password'])&&$data['password'])
        {
            $data['password']=bcrypt($data['password']);
        }
        else {

            unset($data['password']);
        }

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $data['avatar'] = $file->store('avatars', 'public');

        } else {
            if ($request['resetImage']) {

                $data['avatar'] = "";

            }
        }
        $user->update($data);

        return ['response'=>'updated'];
    }

    public function destroy(User $user)
    {
        $user_role = auth()->user()->role;
        if($user_role=='Адмін') {

            $user->delete();

            return ['response' => 'deleted'];
        }
    }
}
