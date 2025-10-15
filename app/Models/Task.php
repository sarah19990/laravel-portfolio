<?php

namespace App\Models;

use illuminate\Database\Eloquent\Model;
use illuminate\database\eloquent\Relations\BelongsTo;

class Task extends Model
{


  public function project(): BelongsTo


  {
    return $this->belongsTo(Project::class);
  }
}
