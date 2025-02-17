<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Permission extends ModelsPermission implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;
}
