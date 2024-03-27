<?php

namespace App\Console\Commands;

use App\Jobs\SendEmailToSubscriber;
use App\Mail\PostEmail;
use App\Models\EmailLog;
use App\Models\Website;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send posts to subscribers';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $websites = Website::all();
        foreach($websites as $website){
            $subscribers = $website->users()->get();
            foreach ($subscribers as $subscriber) {
                $subId = $subscriber->pivot->id;
                $posts = EmailLog::where("subscription_id",$subId)->get()->pluck("post_id");
                $result = $website->posts()->whereNotIn('id',$posts)->get();
                                
                if(count($result) != 0){
                    foreach($result as $job){
                        Mail::to($subscriber->email)
                                ->queue(new PostEmail($job));
                    }
                }
            }
        }
    }
}
