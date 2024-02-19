<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تسک صبا ایده</title>
</head>
<style>
    .reservationTable{
        border: 1px black solid;
        width: 95%;
        max-width: 800px;
    }
    .reservationTable th, td {
        border: 1px black solid;
    }
    .reservationTable th {
        padding: 10px;
    }
    .reservationHour{
        font-weight: bold;
        text-align: center;
    }
    .reserveDate {
        font-weight: bold;
    }
    .notReserved{
        cursor: pointer;
    }
    .reservedByAnother{
        background-color: grey;
        cursor: not-allowed;
    }
    .reservedByMe{
        background-color: green;
        cursor: pointer;
    }
    .today{
        background-color: orange;
    }
    .alert {
        padding: 10px;
        max-width: 800px;
    }
    .alert.danger{
        background-color: lightcoral;
        border: 1px red solid;
        color: red;
        border-radius: 10px;
    }
    .alert.success{
        background-color: lightgreen;
        border: 1px green solid;
        color: green;
    }
</style>
<body dir="rtl">

<?php $message = getFlashMessage(); if(isset($message)): ?>
<div class="alert <?= $message['type'] ?>"><?= $message['message'] ?></div>
<?php endif; ?>
