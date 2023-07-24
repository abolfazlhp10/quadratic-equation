<!doctype html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title> محاسبه آنلاین معادله درجه دو
    </title>
</head>

<body>
    <div class="alert alert-dark mt-2 text-center">
        <h2>
            محاسبه آنلاین معادله درجه دو
        </h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto bg-white shadow rounded mt-5">
                <?php if (isset($_GET["field"])) { ?>
                    <div class="alert alert-danger mt-3 text-center" style="direction: rtl;">
                        لطفا ابتدا تمام فیلدها را پر کنید
                    </div>
                <?php } ?>
                <div class="alert alert-secondary mt-3 text-center" style="direction: rtl;">
                    لطفا ضرايب معادله درجه 2 خود را وارد كنيد (<?php echo " a" . "x<sup>2</sup> + b" . "x + c" . " =" . " 0 "; ?>)

                </div>
                <form method="post">
                    <div class="form-group">
                        <input type="number" name="a" class="form-control" placeholder="a : ">
                    </div>
                    <div class="form-group">
                        <input type="number" name="b" class="form-control" placeholder="b : ">
                    </div>
                    <div class="form-group">
                        <input type="number" name="c" class="form-control" placeholder="c : ">
                    </div>
                    <button class="btn btn-primary btn-block mb-3" name="submit"> تاييد</button>
                </form>
            </div>
        </div>
    </div>
    <?php if (isset($_POST["submit"])) { ?>
        <?php

        if (empty($_POST["a"]) or empty($_POST["b"]) or empty($_POST["c"])) {
            header("location:index.php?field=empty");
        } else {

        ?>

            <?php

            //find the answer of quadratic equation

            $a = $_POST["a"];
            $b = $_POST["b"];
            $c = $_POST["c"];

            $delta = $b * $b - 4 * $a * $c; //delta=b2-4ac

            if ($a == 0) {
                $x1 = -$c / $b;
                $x2 = 0;
            }
            if ($delta > 0 and $a != 0) {
                $x1 = (-$b + pow($delta, 0.5)) / 2 * $a;
                $x2 = (-$b - pow($delta, 0.5)) / 2 * $a;
            }
            if ($delta == 0) {
                $x = -$b / (2 * $a);
            }

            ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto bg-white shadow rounded mt-3">
                        <div class="alert alert-secondary mt-3 text-center"> <?php
                                                                                echo "your Quadratic Equation is : ";
                                                                                echo "$a" . "x<sup>2</sup> + $b" . "x + $c" . " =" . " 0";

                                                                                ?></div>
                        <?php if ($a == 0) { ?>
                            <div class="alert alert-success mt-3 text-center">
                                <?php
                                echo "x<sub>1</sub> = " . round($x1,3);
                                echo " , ";
                                echo "x<sub>2</sub> = " . round($x2,3);
                                ?>
                            </div>
                        <?php } ?>
                        <?php if ($delta > 0 and $a != 0) { ?>
                            <div class="alert alert-success mt-3 text-center">
                                <?php
                                echo "x<sub>1</sub> = " . round($x1,3);
                                echo " , ";
                                echo "x<sub>2</sub> = " . round($x2,3);
                                ?>
                            </div>
                        <?php } ?>
                        <?php if ($delta == 0) { ?>
                            <div class="alert alert-success mt-3 text-center">
                                <?php
                                echo "x = " . $x;
                                ?>
                            </div>
                        <?php } ?>
                        <?php if ($delta < 0) { ?>
                            <div class="alert alert-success mt-3 text-center">
                                <?php
                                echo "Your quadratic equation has no real answer
                            ";
                                ?>
                            </div>
                        <?php } ?>




                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
        <?php } ?>
    <?php } ?>

</body>

</html>