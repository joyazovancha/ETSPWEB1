<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view('backend.user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required']
        ]);

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->role_name = $request->role_name;
        $data->domicile = $request->domicile;
        $data->phone_number = $request->phone_number;
        $data->alamat = $request->alamat;
        if ($request->photo) {
            $this->validate($request, [
                'photo' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $file = $request->file('photo');
            $image_name = time() . '_' . $file->getClientOriginalName();

            $img = Image::make($file->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save('photo/thumbnail/' . $image_name);

            $file->move('photo', $image_name);

            $data->photo = $image_name;
        }
        $data->save();
        $data->roles()->attach(Role::where('name', $data->role_name)->first());

        return redirect(route('user.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = User::find($id);

        return view('backend.user.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = User::find($id);

        return view('backend.user.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        if ($request->password)
        {
            $data->password = bcrypt($request->password);
        }
        $data->role_name = $request->role_name;
        $data->domicile = $request->domicile;
        $data->phone_number = $request->phone_number;
        $data->alamat = $request->alamat;
        if ($request->photo) {
            $this->validate($request, [
                'photo' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $file = $request->file('photo');
            $image_name = time() . '_' . $file->getClientOriginalName();

            if ($data->photo) {
                if (File::exists(public_path() .'/photo/' . $data->photo)) {
                    delete(public_path() . '/photo/' . $data->photo);
                }

                if (File::exists('/photo/thumbnail/' . $data->photo)) {
                    delete(public_path() . '/photo/thumbnail/' . $data->photo);
                }
            }

            $img = Image::make($file->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save('photo/thumbnail/' . $image_name);

            $file->move('photo', $image_name);

            $data->photo = $image_name;
        }
        $data->save();
        if ($request->role_name){
            $data->roles()->sync(Role::where('name', $request->role_name)->first());
        }
        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::find($id);
        if (File::exists(public_path() .'/photo/' . $data->photo)) {
            unlink(public_path() . '/photo/' . $data->photo);
        }

        if (File::exists('/photo/thumbnail/' . $data->photo)) {
            unlink(public_path() . '/photo/thumbnail/' . $data->photo);
        }
        $data->delete();
        return redirect(route('user.index'));
    }
}
