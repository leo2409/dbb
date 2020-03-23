<section>
  <h1>Database</h1>
  <form action="" method="post">
    <label for="titolo">Titolo: </label>
    <input type="text" name="titolo" value="<?=$book['titolo'] ?>">
    <label for="prezzo">Prezzo: </label>
    <input type="number" name="prezzo" value="<?=$book['prezzo']?>">
    <label for="data">Data di pubblicazione: </label>
    <input type="text" name="data" value="<?=$book['d_pubblicazione']?>">
    <input type="hidden" name="ID" value="<?=$book['id_libro']?>">
    <input type="submit" value="Modifica">
  </form>
</section>
