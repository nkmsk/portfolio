<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $is_admin = User::where('role', 1)->exists();

        return view('profile.edit', [
            'user' => $request->user(),
            'is_admin' => $is_admin,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // 画像がアップロードされる場合
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageData = 'data:' . $imageFile->getClientMimeType() . ';base64,' . base64_encode(file_get_contents($imageFile));
            $request->user()->image = $imageData;

        // 既存の画像の場合
        } elseif ($request->filled('image')) {
            $request->user()->image = $request->image;

        } else {
            $request->user()->image = null;

        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
