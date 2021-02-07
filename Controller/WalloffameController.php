<?php
namespace App\Controller;

use App\Models\WalloffameModel;

class WalloffameController extends Controller
{


    public function index()
    {
        $Wall = new WalloffameModel;
        $scores = $Wall->findAll();

        $this->render('WallOfFame', ['scores' => $scores]);
    }
}
