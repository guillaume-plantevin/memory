<?php
namespace App\Models;

class WalloffameModel extends Model
{
    protected $id;
    protected $id_user;
    public $scores;
    public $difficulty = 0;

    public function __construct()
    {
        if ($this->difficulty == 1) {
            $this->table = 'easy';

        }elseif ($this->difficulty == 2) {
            $this->table ='normal';

        }elseif ($this->difficulty == 3) {
            $this->table = 'hard';

        }else{
            $this->table = 'perso';
        }
    }
}