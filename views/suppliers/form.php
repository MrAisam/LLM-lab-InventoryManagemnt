<div class="page-header">
  <div>
    <h2><?= isset($supplier) ? 'Edit' : 'Add' ?> Supplier</h2>
    <div class="subtitle"><?= isset($supplier) ? 'Update supplier details' : 'Add a new vendor' ?></div>
  </div>
</div>
<form method="post" class="form-wide">
  <div class="form-grid">
    <div class="field">
      <label>Name<span class="req">*</span></label>
      <input name="name" value="<?= htmlspecialchars($supplier['name'] ?? '') ?>" required>
    </div>
    <div class="field">
      <label>Contact Person</label>
      <input name="contact_person" value="<?= htmlspecialchars($supplier['contact_person'] ?? '') ?>">
    </div>
    <div class="field">
      <label>Phone</label>
      <input name="phone" value="<?= htmlspecialchars($supplier['phone'] ?? '') ?>">
    </div>
    <div class="field">
      <label>Email</label>
      <input name="email" type="email" value="<?= htmlspecialchars($supplier['email'] ?? '') ?>">
    </div>
    <div class="field full">
      <label>Address</label>
      <input name="address" value="<?= htmlspecialchars($supplier['address'] ?? '') ?>">
    </div>
  </div>
  <div class="form-actions">
    <button type="submit">Save Supplier</button>
    <a href="index.php?route=suppliers/list">Cancel</a>
  </div>
</form>