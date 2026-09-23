<?php
function categories_list(): void {
    $categories = db()->query("SELECT * FROM categories ORDER BY name")->fetchAll();
    render('categories/list', ['categories' => $categories]);
}

function categories_add(): void {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        db()->prepare("INSERT INTO categories (name,description) VALUES (?,?)")
            ->execute([input('name'), input('description')]);
        redirect('categories/list');
    }
    render('categories/form');
}

function categories_edit($id): void {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        db()->prepare("UPDATE categories SET name=?, description=? WHERE category_id=?")
            ->execute([input('name'), input('description'), $id]);
        redirect('categories/list');
    }
    $stmt = db()->prepare("SELECT * FROM categories WHERE category_id=?");
    $stmt->execute([$id]);
    render('categories/form', ['category' => $stmt->fetch()]);
}

function categories_delete($id): void {
    db()->prepare("DELETE FROM categories WHERE category_id=?")->execute([$id]);
    redirect('categories/list');
}