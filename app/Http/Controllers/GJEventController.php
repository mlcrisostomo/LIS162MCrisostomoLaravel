<?php

namespace App\Http\Controllers;

use App\Models\GJEvent;
use Illuminate\Http\Request;

class GJEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gj_event = GJEvent::orderBy('start_date', 'desc')->get();
        return view('gj_event.index', compact('gj_event'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gj_event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'theme' => $request->input('theme'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'limitations' => $request->input('limitations'),
            'notes' => $request->input('notes'),
        ];

        GJEvent::firstOrCreate($data);

        return redirect(route('gj_event.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(GJEvent $gj_event)
    {
        return view('gj_event.show', compact('gj_event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GJEvent $gj_event)
    {
        return view('gj_event.edit', compact('gj_event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GJEvent $gj_event)
    {
        $data = [
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'theme' => $request->input('theme'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'limitations' => $request->input('limitations'),
            'notes' => $request->input('notes'),
        ];

        $gj_event->update($data);

        return redirect(route('gj_event.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GJEvent $gj_event)
    {
        $gj_event->delete();
        
        return redirect(route('gj_event.index'));
    }
}
