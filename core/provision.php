<?php
const BASE_DIR = __DIR__ . '/../';
const APP_DIR = BASE_DIR . 'app/';

require BASE_DIR . 'vendor/autoload.php';

require 'config.php';


try {
    $db = new \Core\DB();

    $action = $db->connection->exec(file_get_contents(APP_DIR . 'migrations.sql'));
    print("Migration Run Successfully.\r\n");


    $day = [];
    $today = Carbon\Carbon::today();
    for ($i = 1; $i <= 7; $i++) {
        $day[] = $today->format('Y-m-d');
        $today->addDay();
    }

    $reservations = [
        [3, $day[5], 1],
        [1, $day[0], 2],
        [4, $day[4], 2],
        [10, $day[1], 1],
        [6, $day[3], 1],
        [4, $day[2], 1],
        [6, $day[6], 1],
        [8, $day[3], 1],
        [5, $day[2], 1],
        [3, $day[3], 1],
    ];

    foreach ($reservations as $reservation) {
        $db->insert('INSERT INTO reservations (hour_id, date, user_id) VALUES (:hourId, :date, :userId)', [
            ':hourId' => $reservation[0],
            ':date' => $reservation[1],
            ':userId' => $reservation[2],
        ]);
    }
    print("Dynamic Reservations added Successfully.\r\n");
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>