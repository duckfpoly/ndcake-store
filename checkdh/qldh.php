<?php
    include('../element/connectdb.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <style>
        .container {
            width: 100vw;
            margin-top: 50px;
        }

        table tr th,
        table tr td {
            height: 30px;
            line-height: 30px;
        }

        .title {
            height: 100px;
            margin-bottom: 30px;
        }

        h1 {
            text-align: center;
        }

        span {
            color: red;
        }

        p {
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">
            <h1><span>ND</span>MOONCAKE</h1>
            <p>ĐƠN HÀNG BÁNH TRUNG THU</p>
        </div>
        <section>
            <?php
            if (isset($_GET['module'])) {
                $module = $_GET['module'];
            } else {
                $module = '';
            }
            if ($module == "detail") {
                include('view/detail.php');
            } else {
                include('view/list.php');
            }
            ?>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>