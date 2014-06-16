<?php

class SessionsController extends \BaseController {

    public function create()
    {
        return View::make('sessions.create');
    }

    public function store()
    {
        $input = Input::all();

        $attempt = Auth::attempt([
            'email'    => $input['email'],
            'password' => $input['password']
        ]);

        if ($attempt) return Redirect::intended('/')->with('flash_message', 'You have been logged in.');

        return Redirect::back()->with('flash_message', 'Invalid credentials.');
    }

    public function destroy()
    {
        Auth::logout();
        return Redirect::home()->with('flash_message', 'You have been logged out.');
    }

}