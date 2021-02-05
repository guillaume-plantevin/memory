<?php 
class Cards {
    // INT
    private $id;
    // STRING / INT ?
    private $value;
    private $side;

    // BOOL
    private $flipped;
    private $myst = "myst.jpg";

    public function __construct(?string $name = null) {
        // echo "i am a new card!  ";
        // echo 'My name is ' . $name, '<br>';
        $this->id = $name;
        $this->side = 'front';
        // indispensable?
        $this->side = FALSE;
    }
    public function createACard() {
        echo '<form action="" id="" method="post" style="background:lightblue" class="card">';
        echo '<input type="hidden" name="cardId" value="' . $this->id . '">';
        // echo '<button type="submit" class="card" style="background:' . isset($this->flipped) ? 'pink' : '../img/' . $this->myst . '">';
        echo '<button class type="submit">';
        echo '<div>';
        // echo 'card';
        echo '</div>';
        
        echo '</button>';
        echo '</form>', '<br>', "\n";;
    }


    public function createCardALink() {
        echo '<a href="playing.php?id=' . $this->id . '" class="card">';
        echo '<div>';
        // echo 'ID';
        echo '</div>';
        echo '</a >', '\n';

    }
    /**
     * verifie si la propriété de la carte est flipped et si TRUE montre la DEUXIÈME face
     */
    public function sideShowed() {
    }


}
/*
<form action="" id="" method="post">
    <input type="hidden" name="cardId" value='0'>
    <button type="submit" class="card" style="background: lightblue">
    </button>
</form>
*/