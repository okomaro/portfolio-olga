<!DOCTYPE html
<html lang="en">
  <head>
    <title>Lommeregner</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <h1>Lommeregner</h1>

  <form action="<?=$_SERVER['PHP_SERVER']?>" method="get">
      <input type="text" name="val1" required autocomplete="off" placeholder=" . "/><br/>
      <input type="text" name="val2" required autocomplete="off" placeholder=" . "/><br/>
      <button class="btn" type="submit" name="operator" value="add">+</button>
      <button class="btn" type="submit" name="operator" value="sub">-</button>
      <button class="btn" type="submit" name="operator" value="mult">x</button>
      <button class="btn" type="submit" name="operator" value="div">/</button>
      <br/>
      <button class="modulus" type="submit" name="operator" value="mod">Modulo operation</button>

    </form>

  <div class="resultat">
    <?php
      // $v1=$_GET['val1'];
      // $v2=$_GET['val2'];

      //server site input validation:
      $v1=filter_input(INPUT_GET, 'val1', FILTER_VALIDATE_FLOAT) or die('UPS: missing or illegal paramenter!');
      $v2=filter_input(INPUT_GET, 'val2', FILTER_VALIDATE_FLOAT) or die('Warning: missing or illegal paramenter!');

      $op=$_GET['operator'];


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

      echo '<b>Result:</b> <br/>'.$v1.' '.$opchar.' '.$v2.' = '.$res;

    ?>
    </div>
  </body>
</html>
