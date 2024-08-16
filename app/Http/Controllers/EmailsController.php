<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplate;
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
        $email_templates = EmailTemplate::with('sentEmails')->get();

        $title = 'Email sablon törlése!';
        $text = "Biztosan törölni szeretné?";
        confirmDelete($title, $text);

        return view('emails', ["email_templates" => $email_templates]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('emails_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|min:3',
            'body' => 'required|min:10',
        ]);

        EmailTemplate::create($request->all());
        return redirect()->route("emailsIndex");
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
        EmailTemplate::destroy($id);
        return redirect()->route("emailsIndex");
    }
}
