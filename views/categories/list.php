<div class="page-header">
  <h2>Categories</h2>
  <a href="index.php?route=categories/add" class="btn">+ Add Category</a>
</div>
<div class="table-wrap">
<table>
<tr><th>Name</th><th>Description</th><th></th></tr>
<?php foreach ($categories as $c): ?>
<tr>
  <td><?= htmlspecialchars($c['name']) ?></td>
  <td><?= htmlspecialchars($c['description'] ?? '') ?></td>
  <td>
    <a href="index.php?route=categories/edit/<?= $c['category_id'] ?>">Edit</a>
    <a href="index.php?route=categories/delete/<?= $c['category_id'] ?>" class="danger" onclick="return confirm('Delete?')">Delete</a>
  </td>
</tr>
<?php endforeach; ?>
</table>
</div>