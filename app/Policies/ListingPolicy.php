<?php

namespace App\Policies;

use App\{User, Listing};
use Illuminate\Auth\Access\HandlesAuthorization;

class ListingPolicy
{
    use HandlesAuthorization;

    public function edit(User $user, Listing $listing)
    {
      return $listing->user_id == $user->id;
    }

    public function update(User $user, Listing $listing)
    {
        return $this->touch($user, $listing);
    }

    public function destroy(User $user, Listing $listing)
    {
        return $this->touch($user, $listing);
    }

    public function touch(User $user, Listing $listing)
    {
        return $listing->ownedByUser($user);
    }
}
