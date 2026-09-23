<h2><?= isset($product) ? 'Edit' : 'Add' ?> Product</h2>
<form method="post">
  <input name="sku" placeholder="SKU" value="<?= htmlspecialchars($product['sku'] ?? '') ?>" required>
  <input name="name" placeholder="Name" value="<?= htmlspecialchars($product['name'] ?? '') ?>" required>
  <input name="category_id" placeholder="Category ID" value="<?= htmlspecialchars($product['category_id'] ?? '') ?>" required>
  <input name="supplier_id" placeholder="Supplier ID" value="<?= htmlspecialchars($product['supplier_id'] ?? '') ?>" required>
  <input name="cost_price" placeholder="Cost Price" value="<?= htmlspecialchars($product['cost_price'] ?? '') ?>" required>
  <input name="selling_price" placeholder="Selling Price" value="<?= htmlspecialchars($product['selling_price'] ?? '') ?>" required>
  <button type="submit">Save</button>
</form>
