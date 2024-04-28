<!-- resources/views/check_number_form.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Check Number</title>
</head>
<body>
    <form action="/check-number" method="post">
        @csrf
        <label for="number">ป้อนเลข: </label>
        <input type="text" name="number" id="number">
        <button type="submit">ตรวจสอบ</button>
    </form>
</body>
</html>
