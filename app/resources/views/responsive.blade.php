<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Design</title>
    <style>
        /* คอลัมน์ขนาดเล็กกว่าหรือเท่ากับ 768px */
        @media screen and (max-width: 768px) {
            .column {
                width: 100%; /* ตั้งค่าความกว้างให้เต็มหน้าจอ */
                float: none; /* ไม่กำหนดการจัดวางด้านข้าง */
            }
        }

        /* คอลัมน์ขนาดใหญ่กว่า 768px */
        @media screen and (min-width: 769px) {
            .column {
                width: 50%; /* ตั้งค่าความกว้างเป็นครึ่งหนึ่งของหน้าจอ */
                float: left; /* จัดวางอยู่ด้านซ้าย */
            }
        }

        /* ล้าง float */
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        /* เพิ่มขอบรอบของแต่ละคอลัมน์ */
        .column {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 5px;
            box-sizing: border-box;
        }
    </style>
</head>

<body>

    <div class="clearfix">
        <div class="column">
            <h2>Column 1</h2>
            <p>This is some text in Column 1.</p>
        </div>
        <div class="column">
            <h2>Column 2</h2>
            <p>This is some text in Column 2.</p>
        </div>
    </div>

</body>

</html>
