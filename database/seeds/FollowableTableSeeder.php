<?php

use App\User;
use Illuminate\Database\Seeder;
use Nuummite\Followable\FeedMessage;

class FollowableTableSeeder extends Seeder
{
    /**
     * Run the database followable seeds.
     *
     * @return void
     */
    public function run()
    {
        // create users
        $users = factory(User::class, 2)->create();

        // make the first user to follow the last one
        $users->first()->follow($users->last());

        // add multiple feed messages to second user
        foreach (factory(FeedMessage::class, 10)->make() as $feedMessage)
          $users->last()->addMessage($feedMessage);

        // sleep two seconds to have a different timestam
        sleep(2);

        // add one feed message to first user
        $users->first()->addMessage(factory(FeedMessage::class, 1)->make()->first());
    }
}
