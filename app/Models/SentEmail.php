<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SentEmail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $select = ['*'];

    
    public function emailTemplate(): HasOne
    {
        return $this->hasOne(EmailTemplate::class, 'id', 'email_template_id');
    }
}
