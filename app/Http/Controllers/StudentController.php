<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResourceFactory;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;


class StudentController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return  Collection<int,StudentResource>
     */
    public function index(Request $req)
    {

        $user = User::find(2);
        return $user->student->notifications;
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
    public function show(User $user): JsonResponse
    {
        $user = User::find(1);
        return response()->json(
            UserResourceFactory::produce($user)
        );
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
