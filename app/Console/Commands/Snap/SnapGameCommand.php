<?php

namespace App\Console\Commands\Snap;

use App\Snap\Game;
use Illuminate\Console\Command;


class SnapGameCommand extends Command
{

    /**
     * @var string
     */
    protected $signature = 'snap:game';

    /**
     * @var string
     */
    protected $description = 'Snap Card Game';

    protected $cardGame = null;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->cardGame = new Game();
    }

    /**
     * @throws \Throwable
     */
    public function handle()
    {
        $this->cardGame->game();

        $result = $this->cardGame->getResults();
        $this->info($result);
    }
}
