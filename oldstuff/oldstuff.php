<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    include __DIR__ . '/template/form.html.php';
    $connection = false;
    //connessione al database
    try {
      $pdo = new PDO('mysql:host=localhost:3335;dbname=dbb;charset:utf8','leo','Natyleo6901');
      $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      echo "database connection established.";
      $connection = true;
    } catch (PDOException $e) {
      echo "unable to connect to the databas server." . $e->getMessage();
    }
    //invio record
    if (isset($_POST['titolo']) && isset($_POST['prezzo']) && isset($_POST['data'])) {
      if ($connection = true) {
        $sql = 'INSERT INTO dbb.libro SET
        titolo = "' . $_POST['titolo'] . '",
        prezzo = "' . $_POST['prezzo'] . '",
        d_pubblicazione = "' . $_POST['data'] . '";';
        try {
          $effectedrow = $pdo->exec($sql);
          $result = "updated " . $effectedrow . " row";
        } catch (PDOException $e) {
          $result = "database error: " . $e->getMessage() . " in" . $e->getLine();
        }
        echo $result;
      }
    }
    //prova con SELECT
    $sql = 'SELECT * FROM dbb.libro;';
    $ricerca = $pdo->query($sql);
    include __DIR__ . '/template/database.html.php'
     ?>
  </body>
</html>
