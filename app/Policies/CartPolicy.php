<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CartPolicy
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
        //user selain member tidak bisa akses book checkout/ menggunakan fasilitas cart.
        return ($user->role=='member'
            ? Response::allow()
            : Response::deny('hanya member yang diperbolehkan untuk mengakses ini'));
    }
}
