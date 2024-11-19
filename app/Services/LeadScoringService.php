<?php

namespace App\Services;

use App\Contracts\LeadScoringServiceInterface;

class LeadScoringService implements LeadScoringServiceInterface
{
    public function getLeadScore(): int
    {
        return rand(0, 100);
    }
}