<?php

namespace App\Http\Controllers;

use App\Models\Registrant;
use App\Models\GJEvent;
use Illuminate\Http\Request;
use App\Models\RegistrantType;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;

class RegistrantController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Temporary bypass code
    if (auth()->user()->user_type_id != 1) {
        abort(403, 'Your ID is ' . auth()->user()->user_type_id . ' but we need 1');
    }

    $registrant = \App\Models\Registrant::all();
    return view('registrant.index', compact('registrant'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gj_event = GJEvent::all();
        /** $types = [
        *    (object) ['id' => 1, 'name' => 'Individual'],
        *    (object) ['id' => 2, 'name' => 'Team'],
        *];
        */
        $types = RegistrantType::all();
        return view('registrant.create', compact('gj_event', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /** $data = $request->validate([
        *    'team_name' => 'required|string|max:255',
        *    'team_members' => 'required|string',
        *    'team_rep_email' => 'required|email',
        *    'gj_event_id' => 'required|exists:gj_event,id',
        *    'registrant_type_id' => 'required|integer',
        *    'user_id' => 'nullable|integer',
        *    'user_user_type_id' => 'nullable|integer',
        *]);
        */

        /** $data = [
        *    'team_name' => $request->input('team_name'),
        *    'team_members' => $request->input('team_members'),
        *    'team_rep_email' => $request->input('team_rep_email'),
        *    'gj_event_id' => $request->input('gj_event_id'),
        *    'registrant_type_id' => $request->input('registrant_type_id'),
        *    'user_id' => $request->input('user_id'),
        *    'user_user_type_id' => $request->input('user_user_type_id'),
        *];
        */
        $validatedData = $request->validate([
            'team_name' => 'required|string|max:255',
            'team_members' => 'required|string',
            'team_rep_email' => 'nullable|email',
            'gj_event_id' => 'required|exists:gj_event,id',
            'registrant_type_id' => 'required|integer',
            /**'user_id' => 'nullable|integer',
            * 'user_user_type_id' => 'nullable|integer',
            */
        ]);

        $validatedData['user_id'] = auth()->id();
        $validatedData['user_user_type_id'] = auth()->user()->user_type_id;


        Registrant::create($validatedData);

        return redirect(route('registrant.index'));
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Registrant $registrant)
    {
        return view('registrant.show', compact('registrant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registrant $registrant)
    {
        $gj_event = GJEvent::all();
        $types = RegistrantType::all();
        return view('registrant.edit', compact('registrant', 'gj_event', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registrant $registrant)
    {
        /**$data = $request->validate([
        *    'team_name' => 'required|string|max:255',
        *    'team_members' => 'required|string',
        *    'team_rep_email' => 'required|email',
        *    'gj_event_id' => 'required|exists:gj_event,id',
        *    'registrant_type_id' => 'required|integer',
        *    'user_id' => 'nullable|integer',
        *    'user_user_type_id' => 'nullable|integer',
        *]);
        */
        /** $this->authorize('update', $registrant);*/

         $validatedData = $request->validate([
            'team_name' => 'required|string|max:255',
            'team_members' => 'required|string',
            'team_rep_email' => 'nullable|email',
            'gj_event_id' => 'required|exists:gj_event,id',
            'registrant_type_id' => 'required|integer',
            /**'user_id' => 'nullable|integer',
            * 'user_user_type_id' => 'nullable|integer',
            */
        ]);

        $validatedData['user_id'] = auth()->id();
        $validatedData['user_user_type_id'] = auth()->user()->user_type_id;

        
        Registrant::update($validatedData);

        return redirect()->route('registrant.show', $registrant)->with('success', 'Registrant updated successfully.');
    }
     
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registrant $registrant)
    {
        $registrant->delete();
        return redirect()->route('registrant.index')
            ->with('success', 'Registrant deleted successfully.');
    }
}
    