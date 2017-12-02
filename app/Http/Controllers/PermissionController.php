<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function manage($id)
    {
        dd($id);
    }
}
