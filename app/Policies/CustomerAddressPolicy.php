<?php

namespace App\Policies;

use App\Models\CustomerAddress;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CustomerAddressPolicy
{
    use HandlesAuthorization;

    // private $id;
    // public function __construct($id)
    // {
    //     $this->id = $id;
    // }

    public function authorized($user)
    {   
        $user_id = $user->id;
        return CustomerAddress::where('user_id', $user_id)
        ? Response::allow()
        : Response::deny('You do not own this post.');
    }
}
