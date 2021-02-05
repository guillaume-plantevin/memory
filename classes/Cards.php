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
        echo '<form action="" method="POST">';
        echo '<input type="hidden" name="cardId" value="' . $this->id . '">';
        echo '<button type="submit" class="card" style="background: center no-repeat url(img/myst.jpg)">';
        echo '</button>';
        echo '</form>', "\n";

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