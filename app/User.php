<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Nuummite\Followable\Traits\FollowableTrait;
use Nuummite\Followable\Traits\FollowerTrait;

class User extends Authenticatable
{
    use FollowableTrait, FollowerTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
    * Main feed of the user. This will hold the feed messages created 
    * by the user and the ones belonging to the object he follows.
    *
    * @return Collection
    */
    public function mainFeed()
    {
        $mainFeed = $this->feed;
        
        // This is for demonstration purposes. It's not recommended to 
        // iterate through the collection as it will run a query
        // in each iteration. It's better to eager load or
        // even create scopes in the FeedMessage class
        foreach ($this->following as $user)
            $mainFeed = $mainFeed->merge($user->feed);

        return $mainFeed->sortByDesc('created_at');
    }
}
