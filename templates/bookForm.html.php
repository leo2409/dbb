<section>
  <div class="form">
    <h1><?=$title?></h1>
    <form action="" method="post">
      <div class="grid-form">
        <!-- Titolo -->
        <div class="input_box">
          <label for="titolo">Titolo </label>
          <input type="text" name="titolo" value="<?=$book['titolo'] ?? '' ?>">
        </div>
        <!-- Prezzo -->
        <div class="input_box">
          <label for="prezzo">Prezzo </label>
          <input type="number" name="prezzo" value="<?=$book['prezzo'] ?? '' ?>">
        </div>
        <!-- Data di Pubblica -->
        <div class="input_box">
          <label for="data">Data di pubblicazione </label>
          <input type="text" name="data" value="<?=$book['d_pubblicazione'] ?? '' ?>">
        </div>
        <!-- AUTORE -->
        <div class="input_box">
          <label for="data">Autore </label>
          <select name="autore">
            <?php foreach ($autori as $row): ?>
              <?php if (empty($book)): ?>
                <?php if ( $book['autore'] == $row['nome']): ?>
                  <option value=<?=$row['nome'] ?> selected><?=$row['nome'] ?></option>
                <?php endif; ?>
              <?php else: ?>
                <option value=<?=$row['nome'] ?>><?=$row['nome'] ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
        </div>
        <!-- Casa editrice -->
        <div class="input_box">
          <label for="data">Casa Editrice </label>
          <select name="editore">
            <?php foreach ($editori as $row): ?>
              <?php if (empty($book)): ?>
                <?php if ( $book['editore'] == $row['nome']): ?>
                  <option value=<?=$row['nome'] ?> selected><?=$row['nome'] ?></option>
                <?php endif; ?>
              <?php else: ?>
                <option value=<?=$row['nome'] ?>><?=$row['nome'] ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <!-- ID hidden -->
      <input type="hidden" name="id" value="<?=$book['id_libro'] ?? '' ?>">
      <!-- Button submit -->
      <div class="input_box">
        <input class="submit" type="submit" value="Save">
      </div>
    </form>
  </div>
</section>
