<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Social; 
use App\Http\Requests\SocialUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;

class SocialController extends Controller
{
    /**
     * Display the user's social form.
     */
    public function edit(Request $request): View
    {
        return view('social.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's social information.
     */
    public function update(SocialUpdateRequest $request): RedirectResponse
    {
        $social = $request->user()->social;

        if($social == null ) {
            $social = new Social();
            $social->user_id = $request->user()->id;
        }
        
        $social->fill($request->validated());
        $social->save();

        return Redirect::route('social.edit')->with('status', 'social-updated');
    }
}
