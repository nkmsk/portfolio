<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\About; 
use App\Http\Requests\AboutUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AboutController extends Controller
{
    /**
     * Display the user's about form.
     */
    public function edit(Request $request)
    {
        return view('about.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's about information.
     */
    public function update(AboutUpdateRequest $request)
    {
        $about = $request->user()->about;

        if($about == null ) {
            $about = new About();
            $about->user_id = $request->user()->id;
        }
        
        $about->fill($request->validated());
        $about->save();

        return Redirect::route('about.edit')->with('status', 'about-updated');
    }
}
