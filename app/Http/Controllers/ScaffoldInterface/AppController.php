<?php

namespace App\Http\Controllers\ScaffoldInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class AppController.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request)
    {        
        if (! $request->user()->hasRole('super_admin')) {
            // Redirect...
            return view('home');
        }
        else{

            $users = \App\User::all()->count();
            $roles = \Spatie\Permission\Models\Role::all()->count();
            $permissions = \Spatie\Permission\Models\Permission::all()->count();
            $entities = \Amranidev\ScaffoldInterface\Models\Scaffoldinterface::all();

            return view('scaffold-interface.dashboard.dashboard', compact('users', 'roles', 'permissions', 'entities'));
        }
    }
}
