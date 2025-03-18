<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $date = $_POST['date'];
        $time = $_POST['time'];

        // اتصال بقاعدة البيانات (مثال بسيط)
        $appointments = json_decode(file_get_contents('appointments.json'), true);

        // إضافة الحجز الجديد
        $appointments[] = ['date' => $date, 'time' => $time];

        // حفظ التغييرات في قاعدة البيانات
        file_put_contents('appointments.json', json_encode($appointments));

        // إرسال تحديث إلى JavaScript
        echo json_encode(['success' => true, 'appointments' => $appointments]);
    }
?>
</body>
</html>