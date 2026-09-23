<div class="page-header">
  <div>
    <h2><?= isset($product) ? 'Edit' : 'Add' ?> Product</h2>
    <div class="subtitle"><?= isset($product) ? 'Update product details' : 'Add a new item to the catalog' ?></div>
  </div>
</div>
<form method="post" class="form-wide">
  <div class="form-grid">
    <?php if (!isset($product)): ?>
    <div class="field">
      <label>SKU<span class="req">*</span></label>
      <input name="sku" required>
    </div>
    <?php endif; ?>
    <div class="field <?= isset($product) ? 'full' : '' ?>">
      <label>Name<span class="req">*</span></label>
      <input name="name" value="<?= htmlspecialchars($product['name'] ?? '') ?>" required>
    </div>

    <div class="field">
      <label>Category<span class="req">*</span></label>
      <select name="category_id" required>
        <option value="">Select category</option>
        <?php foreach ($categories as $c): ?>
          <option value="<?= $c['category_id'] ?>" <?= ($product['category_id'] ?? null) == $c['category_id'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($c['name']) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="field">
      <label>Supplier<span class="req">*</span></label>
      <select name="supplier_id" required>
        <option value="">Select supplier</option>
        <?php foreach ($suppliers as $s): ?>
          <option value="<?= $s['supplier_id'] ?>" <?= ($product['supplier_id'] ?? null) == $s['supplier_id'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($s['name']) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="field">
      <label>Cost Price<span class="req">*</span></label>
      <input name="cost_price" type="number" step="0.01" min="0" value="<?= htmlspecialchars($product['cost_price'] ?? '') ?>" required>
    </div>

    <div class="field">
      <label>Selling Price<span class="req">*</span></label>
      <input name="selling_price" type="number" step="0.01" min="0" value="<?= htmlspecialchars($product['selling_price'] ?? '') ?>" required>
    </div>
  </div>

  <div class="form-actions">
    <button type="submit">Save Product</button>
    <a href="index.php?route=products/list">Cancel</a>
  </div>
</form>