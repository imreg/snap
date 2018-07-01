<?php

namespace App\Snap;

class Player
{
    private $deck = [];

    /**
     * @return array
     */
    public function getDeck(): array
    {
        return $this->deck;
    }

    /**
     * @param array $deck
     */
    public function setDeck(array $deck): void
    {
        $this->deck = array_merge($this->deck, $deck);
    }

    /**$this->player2->setDeck
     * @return array
     */
    public function getCount(): int
    {
        return count($this->deck);
    }
}