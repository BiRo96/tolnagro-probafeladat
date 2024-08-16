<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\EmailTemplateRepositoryInterface;
use Illuminate\Http\Request;


class EmailsController extends Controller
{
    public function __construct(protected EmailTemplateRepositoryInterface $emailTemplateRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        $email_templates = $this->emailTemplateRepository->getAllWithSentEmails();

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
        $form_fields = [
            [
                'field' => 'subject', 
                'label' => 'Tárgy', 
                'type' => 'text'
            ], [
                'field' => 'body', 
                'label' => 'Tartalom', 
                'type' => 'textarea'
            ]
        ];

        return view('emails_create', ["form_fields" => $form_fields]);
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

        $this->emailTemplateRepository->create($request->all());
        return redirect()->route("emailsIndex");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->emailTemplateRepository->delete($id);
        return redirect()->route("emailsIndex");
    }
}
