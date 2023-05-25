<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*  Esempio 1  */
        $contactIds = [1,2];
        $contactToAssociate = Contact::whereIn('id', $contactIds)->get();
        collect($contactToAssociate)->each(function ($contact){
            $contact->user()->associate(User::find(1))->save();
            #$contact->user()->dissociate(User::find(1))->save();
        });


        /* Esempio 2 */
        $userContacts = User::find(1)->contacts()->where('qualification','impiegato')->get();


        /* Esempio 3 */
        $userWithRelation = User::find(1)->has('contacts')->get(); #controlla se c'è una relazione Classe User e Contacts


        #Esempio 4
        $userWithRelationAndQueryCustom = Contact::whereHas('phoneNumber', function($query){
            $query->where('phone', 'like', '%3%');
        })->get();

        return $userWithRelationAndQueryCustom;
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
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
