<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Models\Person;
use Illuminate\Http\RedirectResponse;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response
    {
        $persons = Person::all();

        return response(view('welcome', ['persons' => $person]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): Response
    {
        return response(view('person.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StorePersonRequest $request): RedirectResponse
    {
        if (Person::create($request->validate())) {
            return redirect(route('index'))->with('Success', 'Added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id): Response
    {
        $person = Person::findOrFail($id);

        return response(view('person.edit', ['person' => $person]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePersonRequest $request, string $id): RedirectResponse
    {
        $person = Person::findOrFail($id);

        if ($person->update($request->validate())) {
            return redirect(route('index'))->with('Success', 'Updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id): RedirectResponse
    {
        $person = Person::findOrFail($id);

        if ($person->delete()) {
            return redirect(route('index'))->with('Success', 'Deleted!');
        }

        return redirect(route('index'))->with('error', 'Sorry, Unable to delete this!');
    }
}
