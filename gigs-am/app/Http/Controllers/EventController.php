<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Event::all();
        return view('backend.event.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_event' => "required",
            'tanggal_event' => "required",
            'kapasitas' => "required",
            'deskripsi' => "required"
        ]);

        $data = new Event();
        $data->nama_event = $request->nama_event;
        $data->tanggal_event = $request->tanggal_event;
        $data->kapasitas = $request->kapasitas;
        $data->htm = $request->htm;
        $data->deskripsi = $request->deskripsi;
        if ($request->banner) {
            $this->validate($request, [
                'banner' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $file = $request->file('banner');
            $image_name = time() . '_' . $file->getClientOriginalName();

            $img = Image::make($file->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save('banner/thumbnail/' . $image_name);

            $file->move('banner', $image_name);

            $data->banner = $image_name;
        }
        $data->save();
        return redirect(route('event.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Event::where('id', $id)->first();
        return view('backend.event.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Event::where('id', $id)->first();
        return view('backend.event.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Event::where('id',$id)->first();
        $data->nama_event = $request->nama_event;
        $data->tanggal_event = $request->tanggal_event;
        $data->htm = $request->htm;
        $data->kapasitas = $request->kapasitas;
        $data->deskripsi = $request->deskripsi;
        if ($request->banner) {
            $this->validate($request, [
                'banner' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $file = $request->file('banner');
            $image_name = time() . '_' . $file->getClientOriginalName();

            if ($data->banner) {
                if (File::exists(public_path() .'/banner/' . $data->banner)) {
                    unlink(public_path() . '/banner/' . $data->banner);
                }

                if (File::exists('/banner/thumbnail/' . $data->banner)) {
                    unlink(public_path() . '/banner/thumbnail/' . $data->banner);
                }
            }

            $img = Image::make($file->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save('banner/thumbnail/' . $image_name);

            $file->move('banner', $image_name);

            $data->banner = $image_name;
        }
        $data->save();
        return redirect(route('event.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Event::where('id', $id)->first();
        if (File::exists(public_path() .'/banner/' . $data->banner)) {
            unlink(public_path() . '/banner/' . $data->banner);
        }

        if (File::exists('/banner/thumbnail/' . $data->banner)) {
            unlink(public_path() . '/banner/thumbnail/' . $data->banner);
        }
        $data->delete();
        return redirect(route('event.index'));
    }
}
