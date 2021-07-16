<?php

namespace App\Http\Controllers;

use App\Traits\Data\Accounts\Admin;
use App\Traits\Data\Accounts\Client;

class DataController extends Controller
{
    use Admin, Client;
}
