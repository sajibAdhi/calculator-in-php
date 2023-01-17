<?php
if (isset($_POST['btn'])
) {
    $r = $_POST['r'];
    $operation = $_POST['operation'];
    $input_buffer = $_POST['input_buffer'];
    $output_buffer = $_POST['output_buffer'];
    $btn = $_POST['btn'];
    $dot = $_POST['dot'];

    if ($btn == "0" || $btn == "1" || $btn == "2" || $btn == "3" || $btn == "4" || $btn == "5" || $btn == "6" || $btn == "7" || $btn == "8" || $btn == "9"
    ) {
        $do = $dot;
        $ope = $operation;
        $output = $output_buffer;
        if (empty($input_buffer)
        ) {
            if ($do == ".") {
                $r = $r * 10;
                $a = $btn / $r;
            } else {
                $a = $btn;
            }
            $input = $a;
        } elseif ($input_buffer == $ope) {
            $input_buffer = 0;
            if ($do == ".") {
                $r = $r * 10;
                $a = $btn / $r;
                $input = $input_buffer + $a;
            } else {
                $a = $btn;
                $input = ($input_buffer * 10) + $a;
            }
        } else {
            if ($do == ".") {
                $r = $r * 10;
                $a = $btn / $r;
                $input = $input_buffer + $a;
            } else {
                $a = $btn;
                $input = ($input_buffer * 10) + $a;
            }
        }
    } elseif ($btn == ".") {
        $do = $btn;
        $ope = $operation;
        $input = $input_buffer;
        $output = $output_buffer;
    } elseif ($btn == "rt"
    ) {
        $input = sqrt($input_buffer);
    } elseif ($btn == "sq"
    ) {
        $input = pow($input_buffer, 2);
    } elseif ($btn == "cu"
    ) {
        $input = pow($input_buffer, 3);
    } elseif ($btn == "pn"
    ) {
        $input = (float)-($input_buffer);
        $output = $output_buffer;
    } elseif ($btn == "+"
    ) {
        $ope = $btn;
        $r = 1;
        if (empty($input_buffer)) $output = $output_buffer;
        else $output = $input_buffer;
        $input = "+";
    } elseif ($btn == "-"
    ) {
        $ope = $btn;
        $r = 1;
        if (empty($input_buffer)) $output = $output_buffer;
        else $output = $input_buffer;
        $input = "-";
    } elseif ($btn == "X"
    ) {
        $ope = $btn;
        $r = 1;
        if (empty($input_buffer)) $output = $output_buffer;
        else $output = $input_buffer;
        $input = "X";
    } elseif ($btn == "÷"
    ) {
        $ope = $btn;
        $r = 1;
        if (empty($input_buffer)) $output = $output_buffer;
        else $output = $input_buffer;
        $input = "÷";
    } elseif ($btn == "ans"
    ) {
        if ($operation == "+") {
            $output = $output_buffer;
            $input = $output + $input_buffer;

        } elseif ($operation == "-") {
            $output = $output_buffer;
            $input = $output - $input_buffer;

        } elseif ($operation == "X") {
            $output = $output_buffer;
            $input = $output * $input_buffer;

        } elseif ($operation == "÷") {
            $output = $output_buffer;
            $input = $output / $input_buffer;

        } else
            $input = "Error !";
    } elseif ($btn == "pm") {
        $input = substr($input_buffer, 0, -1);
        $output = $output_buffer;
    } else {
        $r = 1;
        $ope = "";
        $output = "";
        $input = "";
        $do = ",";
    }

}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Calculator</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>


</head>

<body>
<?php // Calculator -----------------------------------------------?>
<div class="container-fluid mt-3">
    <div class="container p-t-1">
        <h1 class="display-4 text-xs-center m-b-2 text-center">Calculator</h1>
        <form action="" method="post">
            <input type="hidden" name="operation" value="<?php if (empty($ope)) echo ""; else echo $ope; ?>"/>

            <input type="hidden" name="dot" value="<?php if (empty($do)) echo ","; else echo $do; ?>"/>

            <input type="hidden" name="r" value="<?php if (empty($r)) echo "1"; else echo $r; ?>"/>

            <div class="jumbotron col-xl-4 col-xl-offset-4 col-md-6 col-md-offset-3 col-xs-12 bg-dark mx-auto"
                 style="padding: 2rem 2rem">
                <?php //input label--------------------------------------- ?>
                <div class="input-group input-group-sm col-xs-12 p-a-0">
                    <input class="col-xs-12 form-control text-left" type="text"
                           style="border-radius:0px; font-family: 'Orbitron', sans-serif; font-size: 1.5em"
                           name="input_buffer" value="<?php if (empty($input)) echo ""; else  echo $input; ?>"/>
                </div>
                <?php // output label -------------------------------------?>
                <div class="input-group input-group-lg col-xs-12">
                    <input class="form-control text-right" type="hidden"
                           style="border-radius: 0px; font-family:'Orbitron', sans-serif; font-size: 2.25em"
                           name="output_buffer" value="<?php if (empty($output)) echo "_"; else echo $output; ?>"/>
                </div>
                <?php // keypad ------------------------------------------?>
                <div class="col-12 mt-3" style="font-family: calculator">

                    <?php // ac,cs,pn,-> ---------------------------------?>
                    <div class="row">
                        <div class="col-3" style="padding: 3px">
                            <button class="btn btn-danger btn-lg btn-block" name="btn" type="submit" value="ac">AC
                            </button>
                        </div>
                        <div class="col-3" style="padding: 3px">
                            <button class="btn btn-danger btn-lg btn-block" name="btn" type="submit" value="pn">±
                            </button>
                        </div>
                        <div class="col-6" style="padding: 3px">
                            <button class="btn btn-danger btn-lg btn-block" name="btn" type="submit" value="pm"><i
                                        class="fas fa-arrow-left"></i></button>
                        </div>
                    </div>
                    <?php // rt, sq, cu, + -------------------------------?>
                    <div class="row">
                        <div class="col-3" style="padding: 3px">
                            <button class="btn btn-secondary btn-lg btn-block" name="btn" type="submit" value="rt">√x
                            </button>
                        </div>
                        <div class="col-3" style="padding: 3px">
                            <button class="btn btn-secondary btn-lg btn-block" name="btn" type="submit" value="sq">
                                x<sup>2</sup></button>
                        </div>
                        <div class="col-3" style="padding: 3px">
                            <button class="btn btn-secondary btn-lg btn-block" name="btn" type="submit" value="cu">
                                x<sup>3</sup></button>
                        </div>
                        <div class="col-3" style="padding: 3px">
                            <button class="btn btn-info btn-lg btn-block" name="btn" type="submit" value="+">+</button>
                        </div>
                    </div>
                    <?php // 7,8,9,- -------------------------------------?>
                    <div class="row">
                        <div class="col-3" style="padding: 3px">
                            <button class="btn btn-secondary btn-lg btn-block" name="btn" type="submit" value="7">7
                            </button>
                        </div>
                        <div class="col-3" style="padding: 3px">
                            <button class="btn btn-secondary btn-lg btn-block" name="btn" type="submit" value="8">8
                            </button>
                        </div>
                        <div class="col-3" style="padding: 3px">
                            <button class="btn btn-secondary btn-lg btn-block" name="btn" type="submit" value="9">9
                            </button>
                        </div>
                        <div class="col-3" style="padding: 3px">
                            <button class="btn btn-info btn-lg btn-block" name="btn" type="submit" value="-">-</button>
                        </div>
                    </div>
                    <?php // 4,5,6,x  ------------------------------------?>
                    <div class="row">
                        <div class="col-3" style="padding: 3px">
                            <button class="btn btn-secondary btn-lg btn-block" name="btn" type="submit" value="4">4
                            </button>
                        </div>
                        <div class="col-3" style="padding: 3px">
                            <button class="btn btn-secondary btn-lg btn-block" name="btn" type="submit" value="5">5
                            </button>
                        </div>
                        <div class="col-3" style="padding: 3px">
                            <button class="btn btn-secondary btn-lg btn-block" name="btn" type="submit" value="6">6
                            </button>
                        </div>
                        <div class="col-3" style="padding: 3px">
                            <button class="btn btn-info btn-lg btn-block" name="btn" type="submit" value="X">x</button>
                        </div>
                    </div>
                    <?php // 1,2,3,/ ------------------------------------ ?>
                    <div class="row">
                        <div class="col-3" style="padding: 3px">
                            <button class="btn btn-secondary btn-lg btn-block" name="btn" type="submit" value="1">1
                            </button>
                        </div>
                        <div class="col-3" style="padding: 3px">
                            <button class="btn btn-secondary btn-lg btn-block" name="btn" type="submit" value="2">2
                            </button>
                        </div>
                        <div class="col-3" style="padding: 3px">
                            <button class="btn btn-secondary btn-lg btn-block" name="btn" type="submit" value="3">3
                            </button>
                        </div>
                        <div class="col-3" style="padding: 3px">
                            <button class="btn btn-info btn-lg btn-block" name="btn" type="submit" value="÷">÷</button>
                        </div>
                    </div>
                    <?php // 0,.,ANS -------------------------------------?>
                    <div class="row">
                        <div class="col-3" style="padding: 3px">
                            <button class="btn btn-secondary btn-lg btn-block" name="btn" type="submit" value=".">.
                            </button>
                        </div>
                        <div class="col-3" style="padding: 3px">
                            <button class="btn btn-secondary btn-lg btn-block" name="btn" type="submit" value="0">0
                            </button>
                        </div>
                        <div class="col-6" style="padding: 3px">
                            <button class="btn btn-primary btn-lg btn-block" name="btn" type="submit" value="ans">=
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!--Scripts-->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>