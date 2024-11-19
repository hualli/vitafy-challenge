<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Resources\LeadResource;
use App\Contracts\LeadScoringServiceInterface;

class LeadController extends Controller
{
    protected $leadScoringService;

    public function __construct(LeadScoringServiceInterface $leadScoringService)
    {
        $this->leadScoringService = $leadScoringService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'index';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:leads,email',
            'phone' => 'nullable|string|max:20'
        ]);

        $lead = Lead::create($validated);
        $lead->score = $this->leadScoringService->getLeadScore();
        $lead->save();

        Client::create(['lead_id' => $lead->id]);

        return new LeadResource($lead);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lead $lead)
    {
        return new LeadResource($lead);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lead $lead)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:leads,email,' . $lead->id,
            'phone' => 'nullable|string|max:20',
        ]);

        $lead->update($validated);
        $lead->score = $this->leadScoringService->getLeadScore();
        $lead->save();

        return new LeadResource($lead);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lead $lead)
    {
        $lead->delete();

        return response()->json([
            'message' => 'Lead deleted successfully.'
        ], 200);
    }
}
