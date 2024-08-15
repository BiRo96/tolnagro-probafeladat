<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class EmailTemplate extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    
    public function sentEmails(): BelongsToMany
    {
        return $this->belongsToMany(SentEmail::class, 'sent_emails', 'email_template_id', 'id');
    }
    
}
