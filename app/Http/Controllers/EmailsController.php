<?php

namespace App\Http\Controllers;

use App\Models\SentEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EmailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sent_emails = SentEmail::select('email_template_id', DB::raw('COUNT(*) as count'))
            ->groupBy('email_template_id')
            ->get();
        return view('emails', ["sent_emails" => $sent_emails]);
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
    public function show(string $id)
    {
        //
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
