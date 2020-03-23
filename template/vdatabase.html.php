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
        <td>
          <form action="delete.php" method="post">
            <input type="hidden" name="ID" value="<?=$row['id_libro'] ?>">
            <input type="submit" value="Delete">
          </form>
        </td>
      </tr>
    <?php endforeach ?>
  </table>
</section>
