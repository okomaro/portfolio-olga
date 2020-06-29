<!DOCTYPE html
<html lang="en">
  <head>
    <title>Lommeregner</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
      <?php
      	// read values from GET or default to empty string
      	$vvv1 = $_GET['val1'] ?? ''; // php7 only https://www.tutorialspoint.com/php7/php7_coalescing_operator.htm
      	$vvv2 = isset($_GET['val2']) ? $_GET['val2'] : ''; // php 5+
      ?>
  <body>
    <h1>Lommeregner</h1>

      <form action="<?=$_SERVER['PHP_SERVER']?>" method="get">
            <input type="number" step="any" name="val1" required autocomplete="off" value="<?=$vvv1?>"  /><br/>
            <input type="number" step="any" name="val2" required autocomplete="off" value="<?=$vvv2?>" /><br/>
            <button class="btn" type="submit" name="operator" value="add">+</button>
            <button class="btn" type="submit" name="operator" value="sub">-</button>
            <button class="btn" type="submit" name="operator" value="mult">x</button>
            <button class="btn" type="submit" name="operator" value="div">/</button>
            <br/>
            <button class="modulus" type="submit" name="operator" value="mod">Modulo operation</button>
            <br/>

      </form>

  <div class="resultat">

  <?php
      $op=$_GET['operator'];

      // condition, when we don't have any values yet

      if (isset($op)) {

          // $v1=$_GET['val1'];
          // $v2=$_GET['val2'];

            //server site input validation:
            // $v1=filter_input(INPUT_GET, 'val1', FILTER_VALIDATE_FLOAT) or die('UPS: missing or illegal paramenter!');
            //
            // $v2=filter_input(INPUT_GET, 'val2', FILTER_VALIDATE_FLOAT) or die('Warning: missing or illegal paramenter!');

            //server site input validation without bug, of operation with 0:
            $v1=filter_input(INPUT_GET, 'val1', FILTER_VALIDATE_FLOAT);
            if ($v1 === false) {die('Warning: missing or illegal paramenter!');}

            $v2=filter_input(INPUT_GET, 'val2', FILTER_VALIDATE_FLOAT);
            if ($v2 === false) {die('Warning: missing or illegal paramenter!');}

            switch($op) {
              case 'add':
                $res = $v1 + $v2;
                $opchar='+';
              break;

              case 'sub':
                $res = $v1 - $v2;
                $opchar='-';
              break;

              case 'mult':
                $res = $v1 * $v2;
                $opchar='x';
              break;


              case 'div':
                $res = $v1 / $v2;
                $opchar='/';
              break;

              case 'mod':
                $res = $v1 % $v2;
                $opchar=' (modulo) ';
              break;

              default:
                $res='Unknown operator "'.$op.'"';
                $opchar=$op;
                break;
            }

        echo '<b>Result:</b> '.$v1.' '.$opchar.' '.$v2.' = '.round($res,4);
  // if you want it rounded echo '<b>Result:</b> <br/>'.$v1.' '.$opchar.' '.$v2.' = '.round($res,2);

        }
    ?>

    </div>

            <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
                  <button class="reset" type="submit">Reset</button>
            </form>


  </body>
</html>
