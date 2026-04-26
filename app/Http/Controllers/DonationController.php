<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonationRequest;
use App\Http\Resources\DonationResource;
use App\Models\Donation;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize("viewAny",Donation::class);
        $donations = Donation::all();
        return response()->json([
            'donations' => DonationResource::collection($donations)
        ]);
    }

    /**
     * Store a newly created Donation.
     *
     * Validates the incoming request via DonationRequest, constructs a draft Donation
     * for policy checks, authorizes the current user to create the donation, persists
     * the record (setting the authenticated user as donor), and returns the created
     * resource wrapped in a DonationResource JSON response.
     *
     * @param  \App\Http\Requests\DonationRequest  $request
     * @return \Illuminate\Http\JsonResponse        JSON response containing the created donation resource (HTTP 201)
     *
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException  If the authenticated user is not authorized (policy denial)
     * @throws \Illuminate\Validation\ValidationException      If request validation fails (handled by DonationRequest)
     */
    public function store(DonationRequest $request):JsonResponse
    {
        // We need to have a Donation draft inorder to grab the donor_id
        $validated = $request->validated();
        $draftDonation = new Donation([
            ...$validated
        ]);    
        Gate::authorize('create',$draftDonation);
        $donation = Donation::create([
            "donor_id" => auth()->user()->id,
            ...$validated
        ]);
        
        return response()->json([
            'donation' => new DonationResource($donation)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Donation $donation)
    {
        Gate::authorize("view",$donation);
        return response()->json([
            'donation' => new DonationResource($donation)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Donation $donation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donation $donation)
    {
        //
    }

    public function donationsByDonor(User $donor){
        Gate::authorize("view",[$donor,Donation::class]);
        $donations = $donor->donations()->get();
        return response()->json([
            "donations" => DonationResource::collection($donations)
        ]);
    }
}
