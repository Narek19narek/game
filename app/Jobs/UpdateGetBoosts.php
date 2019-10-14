<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateGetBoosts implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $boost_amount;
    protected $name;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $name, $boost_amount)
    {
        $this->user = $user;
        $this->name = $name;
        $this->boost_amount = $boost_amount;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $boost_count = $this->user[$this->name];
        $this->user->update([$this->name => $boost_count - $this->boost_amount]);
    }
}
