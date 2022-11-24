<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class RestaurantPolicy
{
    use HandlesAuthorization;


    public function __construct()
    {

    }

    public function index($owner_id)
    {
        return $this->id === $owner_id
        ? Response::allow()
        : Response::deny('این رستوران شم');
    }
}
