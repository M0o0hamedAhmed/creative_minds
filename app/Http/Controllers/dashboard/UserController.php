<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data['users'] = User::query()->get();
        return view('user.index', $data);

    }


    public function create()
    {


    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string',
            'mobile_number' => 'required|numeric|unique:users',
            'password' => 'required|string|confirmed|min:6'
        ]);
        if ($validator->fails()) {
            return redirect()->back();
        };
        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        return redirect('users');


    }


    public function show($id)
    {


    }


    public function edit($id)
    {
        $data['user'] = User::query()->findOrFail($id) ;
        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update( Request $request, $id)
    {
        User::query()->find($id)->update([
            'user_name' => $request->user_name,
            'mobile_number' => $request->mobile_number,
            ]);
        return redirect('users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('users');
    }
}
