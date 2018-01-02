<?php
namespace App\Listeners;
use App\User;
use App\Profile;
use DB;
use App\Events\UserProfile;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
class CreateProfile
{
    /**
     * Create the event listener.
     *
     * @return void
    */
    public function __construct()
    {    
    }
    /**
     * Handle the event.
     *
     * @param  UserProfile  $event
     * @return void
    */
    public function handle(UserProfile $event)
    {
        $user_email = $event->user->email;
        $userid = User::select('users.id')->where('users.email','=',$event->user->email)->first();        
        $p = new Profile;
        DB::table('profile')->insert(
                [
                    'userid' => $userid['id'],
                    'username' => $user_email
            ]); 
    }
}
