<section>
  <h1>Database</h1>
  <?php if (isset($error)): ?>
    <div class="error">
      <p>
        <?=$error?>
      </p>
    </div>
  <?php else: ?>
    <div class="connected">
      <p>Database connection established</p>
    </div>
    <?php foreach ($books as $book): ?>
      <blockquote>
        <p>
            <?=htmlspecialchars($book,ENT_QUOTES, 'UTF-8')?>
        </p>
      </blockquote>
    <?php endforeach; ?>
  <?php endif; ?>
  <form action="" method="post">
    <label for="titolo">Inserisci il titolo: </label>
    <input type="text" name="titolo" placeholder="titolo">
    <label for="prezzo">inserisci il prezzo: </label>
    <input type="number" name="prezzo" placeholder="prezzo">
    <label for="data">inserisci la data di pubblicazione: </label>
    <input type="text" name="data" placeholder="data">
    <input type="submit" value="inserisci">
  </form>
  <p>
    <?php if (isset($addrecord)) {
      echo $addrecord;
    } ?>
  </p>
</section>
