<?php

namespace App\Http\Controllers;

use App\Models\Pewpew;
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
        return view('pewpews.index');
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
        return ;
    }

    /**
     * Display the specified resource.
     */
    public function show(Pewpew $pewpew)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pewpew $pewpew)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pewpew $pewpew)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pewpew $pewpew)
    {
        //
    }
}
