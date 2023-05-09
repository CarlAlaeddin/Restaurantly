<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use App\Models\User;
use App\Notifications\ContactNotification;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $contacts = Contact::query()->orderBy('id', 'desc')->paginate(10);

        return view('Admin.pages.contact.index', compact(['contacts']));
    }


    /**
     * Store a newly created resource in storage.
     * @param StoreContactRequest $request
     * @return RedirectResponse
     */
    public function store(StoreContactRequest $request): RedirectResponse
    {
        $contact = new Contact([
            'user_id' => auth()->user()->id,
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message')
        ]);

        $user = User::query()->where('id', 'LIKE', auth()->user()->id)->get();
        Notification::send($user, new ContactNotification($contact));
        $contact->save();
        return redirect()->route('index')->with('success', 'Your comment has been registered correctly, an email has been sent to you');
    }

    /**
     * Display the specified resource.
     * @param Contact $contact
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function show(Contact $contact): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin.pages.contact.show',compact(['contact']));
    }


    /**
     * Remove the specified resource from storage.
     * @param Contact $contact
     * @return RedirectResponse
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();
        return redirect()->route('contact.index')->with('success','The deletion was successful');
    }
}
