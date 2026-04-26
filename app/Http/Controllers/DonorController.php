<?php

namespace App\Http\Controllers;

use App\Http\Resources\DonorResource;
use App\Http\Resources\UserResourceFactory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return  Collection<int,DonorResource>
     */
    public function index():Collection
    {
       return UserResourceFactory::collection(users: User::where('role','donor')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
