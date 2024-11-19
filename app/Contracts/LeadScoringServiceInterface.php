<?php

namespace App\Contracts;

interface LeadScoringServiceInterface
{
    public function getLeadScore(): int;
}