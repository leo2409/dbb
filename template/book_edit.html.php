<section>
  <div class="form">
    <h1>Modifica libro</h1>
    <form action="" method="post">
      <div class="grid-form">
        <div class="input_box">
          <label for="titolo">Titolo </label>
          <input type="text" name="titolo" value="<?=$book['titolo'] ?>">
        </div>
        <div class="input_box">
          <label for="prezzo">Prezzo </label>
          <input type="number" name="prezzo" value="<?=$book['prezzo']?>">
        </div>
        <div class="input_box">
          <label for="data">Data di pubblicazione </label>
          <input type="text" name="data" value="<?=$book['d_pubblicazione']?>">
        </div>
        <div class="input_box">
          <label for="data">Autore </label>
          <input type="text" name="autore" value="<?=$book['idautore']?>">
        </div>
        <div class="input_box">
          <label for="data">Casa Editrice </label>
          <select name="editore">
            <?php foreach ($n_editori as $row): ?>
              <?php if ( $book['editore'] == $row['nome']): ?>
                <option value=<?=$row['nome'] ?> selected><?=$row['nome'] ?></option>
              <?php else: ?>
                <option value=<?=$row['nome'] ?>><?=$row['nome'] ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <input type="hidden" name="ID" value="<?=$book['id_libro']?>">
      <div class="input_box">
        <input class="submit" type="submit" value="Modifica">
      </div>
    </form>
  </div>
</section>
