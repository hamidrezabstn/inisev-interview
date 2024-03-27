<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EmailLog extends Pivot
{
    public $table = "email_logs";
}
