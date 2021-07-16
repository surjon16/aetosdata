<?php

namespace App\Http\Controllers;

use App\Traits\Data\Account;
use App\Traits\Data\Role;
use App\Traits\Data\Common;

class DataController extends Controller
{
    use Common, Account, Role;
}
