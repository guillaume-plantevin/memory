<?php

class Memory extends Deck {
    private $value = '00112233445566778899';
    private $deck = [];
    private $shuffledDeck = [];
    private $finalDeck = [];

    private $difficulty;
    private $totalPairs;

    private $previousTurn;
    private $actualTurn;

    private $score;

    public function setDifficulty($difficulty) {
        $this->difficulty = $difficulty;
        $this->totalPairs = $difficulty;
    }
    public function getDifficulty() {
        return $this->difficulty;
    }
    public function printDeck() {
        foreach($this->shuffledDeck as $k => $v) {
            $this->finalDeck[$k] = new Cards($k, $v);
            $this->finalDeck[$k]->printCard();
        }
        // vdp($finalDeck, '$finalDeck');
        // die;
    }


    /**
     * choisis la quantité de carte en rapport avec le niveau de difficulté
     * @return array les cartes qui seront utilisées, MAIS dans le bon ordre
     */
    public function createDeck() {
        $numbCards = $this->difficulty * 2;
        for ($i = 0; $i <= $numbCards - 1; ++$i) {
            $nameOValue = 'card' . $this->value[$i] . '.jpg';
            $this->deck[$i] = $nameOValue;
        }
        // return $this->deck;
    }

    /**
     * Mélange les cartes dont le nombre est décidé par le choix de la difficulté
     * @return array, qui est passé en $_SESSION, pour le moment
     */
    public function shuffleDeck() {
        $this->shuffledDeck = $this->deck;
        shuffle($this->shuffledDeck);
        // return $this->shuffledDeck;
    }

    /**
     * à partir du nombre de carte dans le jeu, 
     * crée les cartes et leur attribut l'id et la valeur dans le jeu de carte mélangé
     * METHODE POUVANT BLOQUER LA PROGRESSION SI NON-ADAPTÉE
     */
    public function buildDeck($array) {
        foreach ($array as $k => $v) {
            $this->createCard($k);
        }
    }

    /**
     * charge le tour actuel en tour précédent lorsque qu'une nouvelle carte est choisie
     * @param int $id, récupéré par $_GET['id'] pour le moment
     */
    public function setActualTurn($id) {
        $this->actualTurn = $id;
    }


    /**
     * charge le tour actuel en tour précédent lorsque qu'une nouvelle carte est choisie
     * @param int $id, récupéré par $_GET['id'] pour le moment
     */
    public function setPreviousTurn($id) {
        $this->previousTurn = $this->actualTurn;
        $this->actualTurn = $id;
    }


    /**
     * méthode pour déterminer s'il y a une valeur dans la propriété previousTurn
     * @return bool
     */
    public function pTurnExists(): bool {
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
     * efface les valeurs pour les deux propriétés: previousTurn & actualTurn
     * 
     */
    private function unsetTurns() {
        unset($this->actualTurn);
        unset($this->previousTurn);
    }


    /**
     * comparaison entre deux cartes/propriétés, 
     */
    public function comparison() {
        if ($this->finalDeck[$this->previousTurn] ===  $this->finalDeck[$this->actualTurn]) {
            // DEBUG
            echo 'MEME VALEUR';

            $this->score += 1;
            $this->totalPairs -= 1;
        }
        else {
            // DEBUG
            echo "VALEURS DIFFERENTES";
        }
        $this->unsetTurns();
    }


    /**
     * renvoie le score pour avoir un suivi-visuel du score du joueur
     * @return string
     */
    public function printScore() {
        if (!isset($this->score))
            return '<p>SCORE: 0</p>' . "\n";
        else 
            return '<p>' . 'SCORE: ' . $this->score . '</p>' . "\n";
    }

    /**
     * arrête la partie lorsque le joueur a découvert toutes les paires
     * @return bool
     */
    public function stopGame() {
        if ($this->totalPairs == 0)
            return TRUE;
        else
            return FALSE;
    }

    public function flippingCard($id) {
        // $this->finalDeck[$id]->flipCard($id);
    }
}