<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class BookPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(User $user){
        //fitur manajemen buku (backend), bagian view/retrieve
        //hanya bisa diakses oleh admin dan karwayan
        //juga diimplementasikan untuk category
        return ($user->role=='admin' || $user->role=='karyawan' 
            ? Response::allow()
            : Response::deny('anda harus jadi admin atau karyawan untuk mengakses ini'));
    }

    public function admin(User $user){
        //fitur manajemen buku (backend), bagian delete
        //hanya bisa diakses oleh admin saja
        //juga diimplementasikan untuk category
        return ($user->hakakses=='admin'
            ? Response::allow()
            : Response::deny('anda harus jadi admin atau karyawan untuk melakukan ini'));
    }
}
