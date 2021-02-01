<?php
    require_once '../functions/functions.php';
class Memory {
    private $pairs = ['A', 'A', 'B', 'B', 'C', 'C', 'D', 'D', 'E', 'E', 'F', 'F', 'G', 'G'];
    private $difficulty;
    private $desk;

    public function setDifficulty(int $difficulty) {
        $this->difficulty = $difficulty;
        echo 'difficulty = ' . $this->difficulty;
    }
    public function createDesk(): array {
        $desk = [];
        $numbCards = $this->difficulty * 2;
        // echo $numbCards;
        // die;
        for ($i = 0; $i <= $numbCards - 1; ++$i) {
            $desk[$i] = $this->pairs[$i];
        }
        $this->desk = $desk;
        prp($desk);
        return $desk;
    }
    public function shuffleDesk():array {
        shuffle($this->desk);
        return $this->desk;

    }
}