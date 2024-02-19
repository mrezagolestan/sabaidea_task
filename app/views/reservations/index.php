<?php
function dayOfWeek($day){
    $dayOfWeek = ['یکشنبه','دوشنبه','سه شنبه','چهارشنبه','پنجشنبه','جمعه','شنبه'];
    return $dayOfWeek[$day];
}

//transformed reserves to indexed array for easy and optimized use
$indexedReserves = [];
foreach ($reserves as $reserve){
    $index = $reserve['hour_id'] . '_' . $reserve['date'];
    $indexedReserves[$index] = $reserve['user_id'];
}

layout('top');
?>

<h2>تقویم رزرو</h2>
<table class="reservationTable">
    <thead>
        <tr>
            <th></th>
            <?php foreach ($days as $dayKey => $day): ?>
            <th <?php if($dayKey == 0): ?> class="today" <?php endif; ?> >
                <div class="reserveDate"><?= substr($day["date"],8,2) ?></div>
                <div class="reserveDay"><?= dayOfWeek($day["day"]) ?></div>
            </th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($hours as $hour): ?>
        <tr>
            <td class="reservationHour"><?= $hour['title'] ?></td>
            <?php foreach ($days as $day): ?>
            <?php
            $index = $hour['id'] . '_' . $day['date'];
            if(!isset($indexedReserves[$index])): ?>
            <td class="notReserved" onclick="reserve(<?= $hour["id"] ?>,'<?= $day["date"] ?>');" title="برای رزرو کلیک کنید">
            </td>
            <?php elseif(isset($indexedReserves[$index]) && $indexedReserves[$index] == $currentUser): ?>
            <td class="reservedByMe" onclick="reserve(<?= $hour["id"] ?>,'<?= $day["date"] ?>');" title="برای کنسل کردن رزرو کلیک کنید">
            </td>
            <?php elseif(isset($indexedReserves[$index]) && $indexedReserves[$index] != $currentUser): ?>
            <td class="reservedByAnother" title="شما نمی توانید زمان فرد دیگری را رزرو کنید">
            </td>
            <?php endif; ?>
            <?php endforeach; ?>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script type="text/javascript">
    function reserve(hourId, date){
        window.location.href = '/reservations/' + hourId + '/' + date + '/reserve';
    }
</script>
<?php layout('down'); ?>