<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\User;
use App\Notifications\ContactNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
     * @param StoreContactRequest $request
     * @return RedirectResponse
     */
    public function store(StoreContactRequest $request): RedirectResponse
    {

        $contact = new Contact([
            'user_id'   =>      auth()->user()->id,
            'name'      =>      $request->get('name'),
            'email'     =>      $request->get('email'),
            'subject'   =>      $request->get('subject'),
            'message'   =>      $request->get('message')
        ]);

        $user = User::query()->where('id','LIKE',auth()->user()->id)->get();
        Notification::send($user, new ContactNotification($contact));
        $contact->save();
        return redirect()->route('index')->with('success','Your comment has been registered correctly, an email has been sent to you');
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
    public function update(UpdateContactRequest $request, Contact $contact)
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
