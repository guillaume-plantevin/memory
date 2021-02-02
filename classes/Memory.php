<?php
    require_once '../functions/functions.php';
class Memory {
    // ARRAYS
    private $pairs = ['A', 'A', 'B', 'B', 'C', 'C', 'D', 'D', 'E', 'E', 'F', 'F', 'G', 'G'];
    private $deck = [];
    private $shuffledDeck = [];
    // INT
    private $difficulty;


    public function setDifficulty(int $difficulty) {
        $this->difficulty = $difficulty;
        // echo 'difficulty = ' . $this->difficulty;
    }


    public function createDeck(): array {
        $numbCards = $this->difficulty * 2;
        for ($i = 0; $i <= $numbCards - 1; ++$i) {
            $this->deck[$i] = $this->pairs[$i];
        }
        // prp($this->deck);
        // prp($this->shuffledDeck);
        return $this->deck;
    }


    public function shuffleDeck():array {
        $this->shuffledDeck = $this->deck;
        shuffle($this->shuffledDeck);
        return $this->shuffledDeck;
    }


    public function showDifficulty() {
        return $this->difficulty;
    }
    public function createCard($index, $value) {
        echo '<div class="card">';
        echo '<a href="playing.php?id=' . $index . '&value=' . $value . '">';
        echo '<p>id=' . $index . '</p>' ;
        echo '<p>value=' . $value . '</p>';
        echo '</a>';
        echo '</div>', "\n";
    }

    public function buildDeck($arrayValues) {
        foreach ($arrayValues  as $k => $v) {
            $this->createCard($k, $v);
        }
    }
}