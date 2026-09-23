<div class="page-header">
  <h2>Products</h2>
  <a href="index.php?route=products/add" class="btn">+ Add Product</a>
</div>
<div class="table-wrap">
<table>
<tr><th>SKU</th><th>Name</th><th>Category</th><th>Supplier</th><th>Price</th><th></th></tr>
<?php foreach ($products as $p): ?>
<tr>
  <td><?= htmlspecialchars($p['sku']) ?></td>
  <td><?= htmlspecialchars($p['name']) ?></td>
  <td><?= htmlspecialchars($p['category_name']) ?></td>
  <td><?= htmlspecialchars($p['supplier_name']) ?></td>
  <td><?= htmlspecialchars($p['selling_price']) ?></td>
  <td>
    <a href="index.php?route=products/edit/<?= $p['product_id'] ?>">Edit</a>
    <a href="index.php?route=products/delete/<?= $p['product_id'] ?>" class="danger" onclick="return confirm('Delete?')">Delete</a>
  </td>
</tr>
<?php endforeach; ?>
</table>
</div>