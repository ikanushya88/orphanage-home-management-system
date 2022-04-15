<?php

namespace App\Http\Livewire;

use App\Models\Feed;
use Livewire\Component;

class FeederBlock extends Component
{
    public $onlyFundraise;
    public $home;
    public $feeds;

    protected $listeners = [
        '$refresh'
    ];

    public function render()
    {
        if ($this->onlyFundraise == 1) {
            $feed_query = Feed::where('type', 'fundraise')->whereNotNull('approved_at')->where('expires_at', '>', now());
        } else {
            $feed_query = Feed::where(function($query){
                $query->where('type', 'post')->orWhere(function($query){
                    $query->WhereNotNull('approved_at')->where('expires_at', '>', now());
                });
            });
        }

        if ($this->home != 'all' && $this->home > 0) {
            $feed_query = $feed_query->where('home_id', $this->home);
        }
        $this->feeds = $feed_query->whereStatus('ACTIVE')->latest()->get();
        return view('livewire.feeder-block');
    }
}
