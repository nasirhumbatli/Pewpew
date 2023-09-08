<?php

namespace App\Http\Controllers;

use App\Models\Pewpew;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function Laravel\Prompts\error;

class PewpewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        return view('pewpews.index', ['pewpews' => Pewpew::with('user')->latest()->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255'
        ]);

        $request->user()->pewpews()->create($validated);

        return redirect()->route('pewpews.index');

    }

    public function edit(Pewpew $pewpew):View
    {
        $this->authorize('update', $pewpew);
        return view('pewpews.edit', ['pewpew' => $pewpew]);
    }

    public function update(Request $request, Pewpew $pewpew):RedirectResponse
    {
        $this->authorize('update', $pewpew);

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $pewpew->update($validated);

        return redirect()->route('pewpews.index');
    }

    public function destroy(Pewpew $pewpew):RedirectResponse
    {
        $this->authorize('delete', $pewpew);

        $pewpew->delete();
        return redirect()->route('pewpews.index');
    }
}
