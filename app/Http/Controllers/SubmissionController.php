<?php

namespace App\Http\Controllers;

use App\Models\submission;
use Illuminate\Http\Request;
use App\Models\Registrant;
use App\Models\RegistrantType;
use App\Models\GJEvent;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $submission_db = submission::orderBy('created_at', 'desc')->get();
        $registrant = Registrant::all();
        return view('submission.index', compact('submission_db', 'registrant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $registrant = Registrant::all();
        return view('submission.create', compact ('registrant'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'url' => $request->input('url'),
            'permission_status' => $request->input('permission_status'),
            'registrant_id' => $request->input('registrant_id'),
        ];

        submission::create($data);

        return redirect(route('submission.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(submission $submission_db)
    {
        $registrant = Registrant::all();
        return view('submission.show', compact('submission_db', 'registrant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(submission $submission)
    {

        $registrant = Registrant::all();
        return view('submission.edit', compact('submission_db', 'registrant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, submission $submission)
    {
        $data = [
            'name' => $request->input('name'),
            'url' => $request->input('url'),
            'permission_status' => $request->input('permission_status'),
            'registrant_id' => $request->input('registrant_id'),
        ];

        $submission->update($data);

        return redirect(route('submission.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(submission $submission)
    {
        $submission->delete();
        return redirect(route ('submission.index'));
    }
}
