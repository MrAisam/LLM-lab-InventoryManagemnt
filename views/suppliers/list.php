<div class="page-header">
  <h2>Suppliers</h2>
  <a href="index.php?route=suppliers/add" class="btn">+ Add Supplier</a>
</div>
<div class="table-wrap">
<table>
<tr><th>Name</th><th>Contact</th><th>Phone</th><th>Email</th><th></th></tr>
<?php foreach ($suppliers as $s): ?>
<tr>
  <td><?= htmlspecialchars($s['name']) ?></td>
  <td><?= htmlspecialchars($s['contact_person'] ?? '') ?></td>
  <td><?= htmlspecialchars($s['phone'] ?? '') ?></td>
  <td><?= htmlspecialchars($s['email'] ?? '') ?></td>
  <td>
    <a href="index.php?route=suppliers/edit/<?= $s['supplier_id'] ?>">Edit</a>
    <a href="index.php?route=suppliers/delete/<?= $s['supplier_id'] ?>" class="danger" onclick="return confirm('Delete?')">Delete</a>
  </td>
</tr>
<?php endforeach; ?>
</table>
</div>