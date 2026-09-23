<div class="page-header">
  <div>
    <h2><?= isset($category) ? 'Edit' : 'Add' ?> Category</h2>
    <div class="subtitle"><?= isset($category) ? 'Update category details' : 'Add a new product category' ?></div>
  </div>
</div>
<form method="post">
  <div class="field">
    <label>Name<span class="req">*</span></label>
    <input name="name" value="<?= htmlspecialchars($category['name'] ?? '') ?>" required>
  </div>
  <div class="field">
    <label>Description</label>
    <input name="description" value="<?= htmlspecialchars($category['description'] ?? '') ?>">
  </div>
  <div class="form-actions">
    <button type="submit">Save Category</button>
    <a href="index.php?route=categories/list">Cancel</a>
  </div>
</form>