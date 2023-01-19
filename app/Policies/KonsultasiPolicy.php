<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Konsultasi;
use Illuminate\Auth\Access\HandlesAuthorization;

class KonsultasiPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any konsultasis.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the konsultasi.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Konsultasi  $konsultasi
     * @return mixed
     */
    public function view(User $user, Konsultasi $konsultasi)
    {
        //
    }

    /**
     * Determine whether the user can create konsultasis.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the konsultasi.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Konsultasi  $konsultasi
     * @return mixed
     */
    public function update(User $user, Konsultasi $konsultasi)
    {
      
    }

    /**
     * Determine whether the user can delete the konsultasi.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Konsultasi  $konsultasi
     * @return mixed
     */
    public function delete(User $user, Konsultasi $konsultasi)
    {
        //
    }

    /**
     * Determine whether the user can restore the konsultasi.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Konsultasi  $konsultasi
     * @return mixed
     */
    public function restore(User $user, Konsultasi $konsultasi)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the konsultasi.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Konsultasi  $konsultasi
     * @return mixed
     */
    public function forceDelete(User $user, Konsultasi $konsultasi)
    {
        //
    }
}
