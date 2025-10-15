<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{


  public function task(): HasMany


  {
    return $this->hasMany(Task::class);
  }
}
