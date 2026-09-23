<?php
function products_list(): void {
    $products = db()->query("SELECT * FROM products ORDER BY name")->fetchAll();
    render('products/list', ['products' => $products]);
}

function products_add(): void {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $stmt = db()->prepare(
            "INSERT INTO products (sku,name,category_id,supplier_id,cost_price,selling_price)
             VALUES (?,?,?,?,?,?)"
        );
        $stmt->execute([
            input('sku'), input('name'), input('category_id'),
            input('supplier_id'), input('cost_price'), input('selling_price'),
        ]);
        redirect('products/list');
    }
    render('products/form');
}

function products_edit($id): void {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $stmt = db()->prepare("UPDATE products SET name=?, cost_price=?, selling_price=? WHERE product_id=?");
        $stmt->execute([input('name'), input('cost_price'), input('selling_price'), $id]);
        redirect('products/list');
    }
    $stmt = db()->prepare("SELECT * FROM products WHERE product_id=?");
    $stmt->execute([$id]);
    render('products/form', ['product' => $stmt->fetch()]);
}

function products_delete($id): void {
    db()->prepare("DELETE FROM products WHERE product_id=?")->execute([$id]);
    redirect('products/list');
}
