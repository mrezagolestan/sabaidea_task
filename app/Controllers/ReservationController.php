<?php

namespace App\Controllers;


use App\Repositories\HourRepository;
use Core\Request;

class ReservationController extends Controller
{

    public function __construct(
        private readonly HourRepository $hourRepository,
        private readonly Request $request,
    )
    {

    }

    public function index()
    {
        //echo $this->request;
        var_dump($this->request->id);
        $hours = $this->hourRepository->getAll();

        view('reservations/index', compact('hours'));
    }

    public function reserve($timeId)
    {
        echo 'detail = ' . $id;
    }
}