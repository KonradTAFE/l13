<?php

namespace App\Http\Controllers;

class StaticController extends Controller
{
    public function index()
    {
        $status = 'Not Logged in';
        $isAdmin = '-';
        $isClient = '-';
        $isStaff = '-';
        $permission = '-';

        if (auth()->check()) {
            $status = 'Logged In';
            $user = auth()->user();
            if ($user->hasRole('admin')) {
                $isAdmin = 'Admin';
            }
            if ($user->hasRole('client')) {
                $isAdmin = 'Client';
            }
            if ($user->hasRole('staff')) {
                $isAdmin = 'Staff';
            }
            $permission = $user->can('admin-only') ? 'Admin' : "Not Admin";
        }



        return "Static Home Page: {$status} | {$isAdmin} | {$isClient} | {$isStaff} | {$permission}";
    }
}
