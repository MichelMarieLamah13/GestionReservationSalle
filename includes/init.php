<?php
$q=$db->prepare("SELECT * FROM notifications
                 WHERE subject_id=:subject_id AND seen=:value1");
$q->execute([
    'subject_id'=>get_session('user_id'),
    'value1'=>'0'
]);

$notifications_count=$q->rowCount();

