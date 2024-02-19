<?php

namespace App\Controllers;


use App\Repositories\DayRepository;
use App\Repositories\HourRepository;
use App\Repositories\ReservationRepository;
use Core\Auth;

class ReservationController extends Controller
{

    public function __construct(
        private readonly HourRepository        $hourRepository,
        private readonly DayRepository         $dayRepository,
        private readonly ReservationRepository $reservationRepository,
        private readonly Auth                  $auth,
    )
    {

    }

    public function index()
    {
        $hours = $this->hourRepository->getAll();
        $days = $this->dayRepository->getAll();

        $from = $days[0]['date'];
        $to = $days[count($days) - 1]['date'];
        $reserves = $this->reservationRepository->reserveList($from, $to);
        $currentUser = $this->auth->getUserId();


        view('reservations/index', compact('hours', 'days', 'reserves', 'currentUser'));
    }

    public function reserve(int $hourId, string $date)
    {

        $exist = $this->reservationRepository->reserveExist($hourId, $date);

        if ($exist && $exist['user_id'] == $this->auth->getUserId()) {
            setFlashMessage('danger', 'این زمان توسط فرد دیگری رزرو شده است و قابلیت رزرو مجدد ندارد');
        }


        if ($exist) {
            if ($this->reservationRepository->cancelReserve($hourId, $date)) {
                setFlashMessage('success', 'رزرو شما با موفقیت کنسل شد');
            } else {
                setFlashMessage('danger', 'رزرو کنسل نشد');
            }
        } else {
            if ($this->reservationRepository->reserve($hourId, $date, $this->auth->getUserId())) {
                setFlashMessage('success', 'رزرو شما با موفقیت انجام شد');
            } else {
                setFlashMessage('danger', 'رزرو انجام نشد');
            }
        }
        header('Location: /');
    }
}