<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application|RedirectResponse
     */
    public function index(): Application|View|Factory|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $profile = Profile::query()->where('user_id','LIKE', auth()->user()->id)->first();

        if (empty($profile->id))
        {
            return redirect()->route('profile.create');
        }else{
            return view('Admin.pages.profile.index', compact(['profile']));
        }

    }

    /**
     * Show the form for creating a new resource.
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('Admin.pages.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreProfileRequest $request
     * @return RedirectResponse
     */
    public function store(StoreProfileRequest $request): RedirectResponse
    {
        $image = time() . '-profile' . '.' . $request->file('image')->getClientOriginalExtension();
        $profile = new Profile([
            'user_id'         =>        auth()->user()->id,
            'phone_number'    =>        $request->get('phone_number'),
            'image'           =>        $image,
            'address'         =>        $request->get('address'),
            'beloved'         =>        $request->get('beloved'),
            'biography'       =>        $request->get('biography'),
        ]);
        $profile->save();
        $request->image->move('images/profile', $image);
        return redirect()->route('profile.index')->with('success', 'The new profile was registered correctly');

    }


    /**
     * Update the specified resource in storage.
     * @param UpdateProfileRequest $request
     * @param Profile $profile
     * @return RedirectResponse
     */
    public function update(UpdateProfileRequest $request, Profile $profile): RedirectResponse
    {
        if (!is_null($request->file('image'))) {
            $image = time() . '-profile' . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image->move('images/profile', $image);
            $profile->image = $image;
        }

        $profile->biography             =       $request->get('biography');
        $profile->beloved               =       $request->get('beloved');
        $profile->address               =       $request->get('address');
        $profile->phone_number          =       $request->get('phone_number');
        $profile->user_id               =       auth()->user()->id;

        $profile->update();

        $profile->user->name            =       $request->get('name');
        $profile->user->email           =       $request->get('email');

        if ($profile->user->email === $request->get('email'))
        {
            $profile->user->email_verified_at = null;
        }

        $profile->user->save();

        return redirect()->route('profile.index')->with('success','create profile successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
