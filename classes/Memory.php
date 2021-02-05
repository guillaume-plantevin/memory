<?php
    require_once '../functions/functions.php';
class Memory extends Cards{
    // ARRAYS
    private $pairs = ['A', 'A', 'B', 'B', 'C', 'C', 'D', 'D', 'E', 'E', 'F', 'F', 'G', 'G'];
    private $deck = [];
    private $shuffledDeck = [];
    // INT
    private $difficulty;

    private $previousTurn;
    private $actualTurn;
    private $score;
    private $totalPairs;
    
    /**
     * défini le nombre de pair utilisé pendant la partie, 
     * ainsi que le nombre total de paires pour que le jeu s'arrête.
     * @param int $difficulty
     * 
     */
    public function setDifficulty(int $difficulty) {
        $this->difficulty = $difficulty;
        $this->totalPairs = $difficulty;
    }


    /**
     * choisis la quantité de carte en rapport avec le niveau de difficulté
     * @return array les cartes qui seront utilisées, MAIS dans le bon ordre
     */
    public function createDeck(): array {
        $numbCards = $this->difficulty * 2;
        for ($i = 0; $i <= $numbCards - 1; ++$i) {
            $this->deck[$i] = $this->pairs[$i];
        }
        return $this->deck;
    }

    /**
     * Mélange les cartes dont le nombre est décidé par le choix de la difficulté
     * @return array, qui est passé en $_SESSION, pour le moment
     */
    public function shuffleDeck():array {
        $this->shuffledDeck = $this->deck;
        shuffle($this->shuffledDeck);
        return $this->shuffledDeck;
    }

    // DEBUG METHOD
    public function showDifficulty() {
        return $this->difficulty;
    }


    /**
     * fonction pour afficher les données HTML, 
     * => SUJET À CHANGER PAR LA SUITE
     * @param int $index
     * @param int $value
     */
    public function createCard($index) {
        // echo '<a href="playing.php?id=' . $index . '" class="card">';
        // echo '<a href="playing.php?id=' . $index . '">';
        // echo '<div class="card">';
        // echo '</div>';
        // echo '</a ><br>';
        echo '<form action="" method="POST">';
        echo '<input type="hidden" name="cardId" value="' . $index . '">';
        echo '<button type="submit" class="card">';
        echo '</button>';
        echo '</form>', "\n";
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
    public function aTurnExists(): bool {
        if (isset($this->actualTurn))
            return TRUE;
        else
            return FALSE;
    }


    // DEBUG METHOD
    public function showPreviousID() {
        return $this->previousTurn;
    }


    // DEBUG METHOD
    public function showActualId() {
        return $this->actualTurn;
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
        if ($this->shuffledDeck[$this->previousTurn] ===  $this->shuffledDeck[$this->actualTurn]) {
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
            return '<p>SCORE: 0</p><br>' . "\n";
        else 
            return '<p>' . 'SCORE: ' . $this->score . '</p>' . "\n";
    }

    // DEBUG METHOD
    public function printReminder() {
        return '<p>' . 'paires restantes: ' . $this->totalPairs . '</p>' . "\n";
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
}