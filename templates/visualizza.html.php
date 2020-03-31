<section>
  <h1>Libri</h1>
  <table class='books-table'>
    <tr>
      <th>Titolo</th>
      <th>Prezzo</th>
      <th>Pubblicazione</th>
    </tr>
    <?php foreach ($result as $row): ?>
      <tr>
        <td><?=$row['titolo'] ?></td>
        <td><?=$row['prezzo'] ?></td>
        <td><?=$row['d_pubblicazione'] ?></td>
        <form action="delete.php" method="get">
          <td>
            <div class="input_modification">
              <input type="submit" value="Edit" formaction="save.php">
            </div>
          </td>
          <td>
            <div class="input_modification">
              <input type="hidden" name="id" value="<?=$row['id_libro'] ?>">
              <input type="submit" value="Delete">
            </div>
          </td>
        </form>
      </tr>
    <?php endforeach ?>
  </table>
</section>
