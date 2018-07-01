<?php

namespace App\Snap;


class Game
{

    const PLAYER_FIRST = 0;

    const PLAYER_SECOND = 1;

    protected $deck = null;

    protected $player1 = null;

    protected $player2 = null;

    protected $cardsOnTheTable = [];

    protected $firstDraw = 0;

    public function __construct()
    {
        $this->deck = new DeckOfCards();
        $this->player1 = new Player();
        $this->player2 = new Player();
    }

    /**
     * Game
     */
    public function game()
    {
        $this->firstDraw = self::PLAYER_FIRST;

        while ($this->deck->isCardAvailable()) {
            $player1 = [];
            $player2 = [];
            $this->draw($player1, $player2);
            $this->compare($player1, $player2);
        }
    }

    /**
     * @return string
     */
    public function getResults()
    {
        return 'Player 1 :'.$this->player1->getCount().' Player 2 : '.$this->player2->getCount();
    }

    /**
     * @param array $player1
     * @param array $player2
     */
    protected function draw(array &$player1,array &$player2)
    {
        switch ($this->firstDraw) {
            case self::PLAYER_FIRST:
                $player1 = $this->deck->oneCard();
                $player2 = $this->deck->oneCard();
                break;
            case self::PLAYER_SECOND:
                $player2 = $this->deck->oneCard();
                $player1 = $this->deck->oneCard();
                break;
        }

        if(count($player1) > 0 && count($player2) > 0 ) {
            $this->cardsOnTheTable[] = $player1;
            $this->cardsOnTheTable[] = $player2;
        }
    }

    /**
     * @param array $player1
     * @param array $player2
     */
    protected function compare(array $player1,array $player2)
    {
        if(!isset($player1['face']) && !$player2['face']) {
            return null;
        }

        if ($player1['face'] === $player2['face']) {
            switch ($this->firstDraw) {
                case self::PLAYER_FIRST:
                    $this->player1->setDeck($this->cardsOnTheTable);
                    $this->cardsOnTheTable = [];
                    $this->firstDraw = self::PLAYER_SECOND;
                    break;
                case self::PLAYER_SECOND:
                    $this->player2->setDeck($this->cardsOnTheTable);
                    $this->cardsOnTheTable = [];
                    $this->firstDraw = self::PLAYER_FIRST;
                    break;
            }
        }
    }
}