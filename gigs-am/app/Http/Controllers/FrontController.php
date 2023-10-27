<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Event::all();
        return view('home', compact('data'));
    }

    public function dashboard()
    {
        $data = Event::all();

        return view('backend.dashboard', compact('data'));
    }

    public function indexEvent()
    {
        $data = Event::all();
        return view('frontend.indexEvent', compact('data'));
    }

    public function detailEvent($id)
    {
        $data = Event::find($id);

        return view('frontend.detailEvent', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Event::find($id);
        return view('frontend.detailEvent', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
