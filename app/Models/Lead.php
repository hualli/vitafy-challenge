<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lead extends Model
{
    use HasUuid, HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'score'];

    protected $casts = [
        'score' => 'integer',
    ];

    public function client()
    {
        return $this->hasOne(Client::class);
    }
}
