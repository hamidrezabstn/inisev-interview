<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Subscription extends Pivot
{
    public $table = "subscriptions";
    protected $fillable = [
        'website_id',
        'user_id',
    ]; 
    
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class,'email_logs')->using(EmailLog::class);
    }
}
