<section>
  <div class="form">
    <h1>Libro</h1>
    <form action="" method="post">
      <div class="grid-form">
        <!-- Titolo -->
        <div class="input-box">
          <label for="titolo">Titolo </label>
          <input type="text" name="book[titolo]" value="<?=$book['titolo'] ?? '' ?>">
        </div>
        <!-- Prezzo -->
        <div class="input-box">
          <label for="prezzo">Prezzo </label>
          <input type="number" name="book[prezzo]" value="<?=$book['prezzo'] ?? '' ?>">
        </div>
        <!-- Data di Pubblica -->
        <div class="input-box">
          <label for="data">Data di pubblicazione </label>
          <input type="text" name="book[d_pubblicazione]" value="<?=$book['d_pubblicazione'] ?? '' ?>">
        </div>
        <!-- AUTORE -->
        <div class="input-box">
          <label for="data">Autore </label>
          <select name="book[idautore]">
            <?php foreach ($autori as $row): ?>
              <?php if (!empty($book['titolo'])): ?>
                <?php if ( $book['idautore'] == $row['idautore']): ?>
                  <option value=<?=$row['idautore'] ?> selected><?=$row['idautore'] ?></option>
                <?php else: ?>
                  <option value=<?=$row['idautore'] ?>><?=$row['idautore'] ?></option>
                <?php endif; ?>
              <?php else: ?>
                <option value=<?=$row['idautore'] ?>><?=$row['idautore'] ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
        </div>
        <!-- Casa editrice -->
        <div class="input-box">
          <label for="data">Casa Editrice </label>
          <select name="book[editore]">
            <?php foreach ($editori as $row): ?>
              <?php if (!empty($book['titolo'])): ?>
                <?php if ( $book['editore'] == $row['nome']): ?>
                  <option value=<?=$row['nome'] ?> selected><?=$row['nome'] ?></option>
                <?php else: ?>
                  <option value=<?=$row['nome'] ?>><?=$row['nome'] ?></option>
                <?php endif; ?>
              <?php else: ?>
                <option value=<?=$row['nome'] ?>><?=$row['nome'] ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <!-- ID hidden -->
      <input type="hidden" name="book[id_libro]" value="<?=$book['id_libro'] ?? '' ?>">
      <!-- Button submit -->
      <div class="input-box">
        <input class="submit" type="submit" value="Save">
      </div>
    </form>
  </div>
</section>
