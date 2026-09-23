<?php
function products_list(): void {
    $products = db()->query(
        "SELECT p.*, c.name AS category_name, s.name AS supplier_name
         FROM products p
         JOIN categories c ON c.category_id = p.category_id
         JOIN suppliers s ON s.supplier_id = p.supplier_id
         ORDER BY p.name"
    )->fetchAll();
    render('products/list', ['products' => $products]);
}

function products_add(): void {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pdo = db();
        $pdo->beginTransaction();
        $stmt = $pdo->prepare(
            "INSERT INTO products (sku,name,category_id,supplier_id,cost_price,selling_price)
             VALUES (?,?,?,?,?,?)"
        );
        $stmt->execute([
            input('sku'), input('name'), input('category_id'),
            input('supplier_id'), input('cost_price'), input('selling_price'),
        ]);
        $productId = $pdo->lastInsertId();
        $pdo->prepare("INSERT INTO inventory (product_id, quantity_on_hand) VALUES (?, 0)")
            ->execute([$productId]);
        $pdo->commit();
        redirect('products/list');
    }
    render('products/form', [
        'categories' => db()->query("SELECT * FROM categories ORDER BY name")->fetchAll(),
        'suppliers'  => db()->query("SELECT * FROM suppliers ORDER BY name")->fetchAll(),
    ]);
}

function products_edit($id): void {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        db()->prepare(
            "UPDATE products SET name=?, category_id=?, supplier_id=?, cost_price=?, selling_price=?
             WHERE product_id=?"
        )->execute([
            input('name'), input('category_id'), input('supplier_id'),
            input('cost_price'), input('selling_price'), $id,
        ]);
        redirect('products/list');
    }
    $stmt = db()->prepare("SELECT * FROM products WHERE product_id=?");
    $stmt->execute([$id]);
    render('products/form', [
        'product'    => $stmt->fetch(),
        'categories' => db()->query("SELECT * FROM categories ORDER BY name")->fetchAll(),
        'suppliers'  => db()->query("SELECT * FROM suppliers ORDER BY name")->fetchAll(),
    ]);
}

function products_delete($id): void {
    db()->prepare("DELETE FROM products WHERE product_id=?")->execute([$id]);
    redirect('products/list');
}