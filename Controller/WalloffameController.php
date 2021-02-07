<?php
namespace App\Controller;

use App\Models\WalloffameModel;

class WalloffameController extends Controller
{


    public function index()
    {
        $Wall = new WalloffameModel;
        $scores = $Wall->findAll(1);

        $this->render('WallOfFame', ['scores' => $scores]);
    }
}
