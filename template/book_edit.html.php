<section>
  <h1>Database</h1>
  <form action="" method="post">
    <div class="input_box">
      <label for="titolo">Titolo: </label>
      <input type="text" name="titolo" value="<?=$book['titolo'] ?>">
    </div>
    <div class="input_box">
      <label for="prezzo">Prezzo: </label>
      <input type="number" name="prezzo" value="<?=$book['prezzo']?>">
    </div>
    <div class="input_box">
      <label for="data">Data di pubblicazione: </label>
      <input type="text" name="data" value="<?=$book['d_pubblicazione']?>">
    </div>
    <input type="hidden" name="ID" value="<?=$book['id_libro']?>">
    <div class="input_box">
      <input type="submit" value="Modifica">
    </div>
  </form>
</section>
