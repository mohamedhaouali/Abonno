<?php

namespace App\Policies;

use App\User;
use App\Station;
use Illuminate\Auth\Access\HandlesAuthorization;

class StationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the outlet.
     *
     * @param  \App\User  $user
     * @param  \App\Station  $outlet
     * @return mixed
     */
    public function view(User $user, Station $station)
    {
        // Update $user authorization to view $outlet here.
        return true;
    }

    /**
     * Determine whether the user can create outlet.
     *
     * @param  \App\User  $user
     * @param  \App\Station  $outlet
     * @return mixed
     */
    public function create(User $user, Station $station)
    {
        // Update $user authorization to create $outlet here.
        return true;
    }

    /**
     * Determine whether the user can update the outlet.
     *
     * @param  \App\User  $user
     * @param  \App\Station  $outlet
     * @return mixed
     */
    public function update(User $user, Station $station)
    {
        // Update $user authorization to update $outlet here.
        return true;
    }

    /**
     * Determine whether the user can delete the outlet.
     *
     * @param  \App\User  $user
     * @param  \App\Station $outlet
     * @return mixed
     */
    public function delete(User $user, station $station)
    {
        // Update $user authorization to delete $outlet here.
        return true;
    }
}