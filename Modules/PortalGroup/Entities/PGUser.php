<?php

namespace Modules\PortalGroup\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Employee\Entities\EMEmployee;
use Modules\UserAdmin\Entities\UserAdmin;

class PGUser extends UserAdmin
{
  public function employee()
  {
    return $this->hasOne(EMEmployee::class, "user_id", "id");
  }
}
