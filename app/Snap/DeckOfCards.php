<?php
namespace App\Snap;

class DeckOfCards
{
    private $suits = [
        'Spades', 'Hearts', 'Clubs', 'Diamonds'
    ];

    private $faces = [
        'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight',
        'Nine', 'Ten', 'Jack', 'Queen', 'King', 'Ace'
    ];

    private $deck = [];

    /**
     * DeckOfCards constructor.
     */
    public function __construct()
    {
        $this->buildDeck();
    }

    /**
     * Build a deck
     */
    private function buildDeck(): void
    {
        $deck = [];
        foreach ($this->suits as $suit) {
            foreach ($this->faces as $face) {
                $deck[] = [
                    'face' => $face,
                    'suit' => $suit
                ];
            }
        }
        $this->setDeck($deck);
    }

    /**
     * @param array $deck
     */
    public function shuffle(array &$deck = []): void
    {
        shuffle($deck);
    }

    /**
     * @param array $deck
     */
    private function setDeck(array $deck = []): void
    {
        $this->shuffle($deck);
        $this->deck = $deck;
    }

    /**
     * @return array
     */
    public function getDeck(): array
    {
        return $this->deck;
    }

    /**
     * @return array
     */
    public function oneCard(): array
    {
        return array_shift($this->deck);
    }

    /**
     * @return bool
     */
    public function isCardAvailable(): bool
    {
        return count($this->deck) > 0;
    }
}