<?php

class Memory extends Deck {
// class Memory {
    // private $value = '00112233445566778899';
    // private $deck = [];
    // private $shuffledDeck = [];
    public $objectDeck = [];

    public $difficulty;
    public $totalPairs;

    public $previousTurn;
    public $actualTurn;
    public $Turn = 2;

    private $score;

    /**
     * Récupère un array de cartes
     * @param array $deck
     */
    public function __construct(array $deck) {
        $this->objectDeck = $deck;
        // $this->difficulty = parent->difficulty;
        // $this->totalPairs = $this->numberOfPairs;
        // $this->difficulty = $deck['difficulty'];
        // $this->totalPairs = $deck['numberOfPairs'];
    }

    public function setDifficulty($int) {
        $this->difficulty = $this->totalPairs = $int;
    }

    /**
     * construit en html la carte de jeu en vérifiant son état par ses propriétés.
     * -> Ne peut plus être cliqué une fois retournée
     * -> est animée au chargement de la page
     */
    public function printCard() {
        foreach($this->objectDeck as $k => $v) {
            echo '<form action="" method="POST">';
            echo '<input type="hidden" name="cardId" value="' . $this->objectDeck[$k]->id . '">';
            // echo '<button type="submit" class="card" ';
            if ($this->objectDeck[$k]->flipped) {
                echo '<button type="submit" class="card" style="background:center no-repeat url(img/' . $this->objectDeck[$k]->getValue() . '); background-size:cover" disabled>';
            }
            else {
                echo '<button type="submit" class="card" style="background: center no-repeat url(img/myst.jpg)">';
            }
            echo '</button>';
            echo '</form>', "\n";
        }
    }

    
    /**
     * charge le tour actuel en tour précédent lorsque qu'une nouvelle carte est choisie
     * @param int $id, récupéré par $_GET['id'] pour le moment
     */
    public function setActualTurn($cardId) {
        $id = intval($cardId);
        $this->objectDeck[$id]->flipCard();
        $this->actualTurn = $id;
    }


    /**
     * charge le tour actuel en tour précédent lorsque qu'une nouvelle carte est choisie
     * @param int $id, récupéré par $_GET['id'] pour le moment
     */
    public function setPreviousTurn($cardId) {
        $id = intval($cardId);
        $this->objectDeck[$id]->flipCard();
        $this->previousTurn = $id;
    }


    /**
     * méthode pour déterminer s'il y a une valeur dans la propriété previousTurn
     * @return bool
     */
    public function previousTurnExists(): bool {
        if (isset($this->previousTurn))
            return TRUE;
        else
            return FALSE;
    }


    /**
     * méthode pour déterminer s'il y a une valeur dans la propriété actualTurn
     * NOTE: peut-être inutile
     * @return bool
     */
    public function actualTurnExists(): bool {
        if (isset($this->actualTurn))
            return TRUE;
        else
            return FALSE;
    }

    /**
     * comparaison entre deux cartes/propriétés, 
     */
    public function comparison() {
        if ($this->objectDeck[$this->actualTurn]->value === $this->objectDeck[$this->previousTurn]->value) {
            // DEBUG
            echo 'MEME VALEUR';
            $this->score += 10;
            $this->totalPairs -= 1;
        }
        else {
            // DEBUG
            echo "VALEURS DIFFERENTES";
            // sleep(3);
            $this->objectDeck[$this->actualTurn]->flipped = FALSE;
            $this->objectDeck[$this->previousTurn]->flipped = FALSE;
            
            // $this->objectDeck[$this->previousTurn]->unFlip();
        }
        $this->unsetTurns();
    }
    // public function unFlip($id) {

    // }

    /**
     * efface les valeurs pour les deux propriétés: previousTurn & actualTurn
     * 
     */
    private function unsetTurns() {
        unset($this->actualTurn);
        unset($this->previousTurn);
    }


    /**
     * ON GARDE
     * renvoie le score pour avoir un suivi-visuel du score du joueur
     * @return string
     */
    public function printScore() {
        if (!isset($this->score))
            return '<p>SCORE: 0</p>' . "\n";
        else 
            return '<p>' . 'SCORE: ' . $this->score . '</p>' . "\n";
    }
    public function printPairs() {
        return '<p>PAIRS LEFT: ' . $this->totalPairs . '</p>' . "\n";
    }

    /**
     * ON GARDE / AMELIORE
     * arrête la partie lorsque le joueur a découvert toutes les paires
     * @return bool
     */
    public function stopGame() {
        if ($this->totalPairs === 0)
            return TRUE;
        else
            return FALSE;
    }

    public function flippingCard($id) {
        // $this->finalDeck[$id]->flipCard($id);
    }
    public function getPreviousTurn() {
        return '<p>PREVIOUS: ' . $this->previousTurn . '</p>' . "\n";
    }
    public function getActualTurn() {
        return '<p>ACTUAL: ' . $this->actualTurn . '</p>' . "\n";

    }
}