<?php
function suppliers_list(): void {
    $suppliers = db()->query("SELECT * FROM suppliers ORDER BY name")->fetchAll();
    render('suppliers/list', ['suppliers' => $suppliers]);
}

function suppliers_add(): void {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        db()->prepare("INSERT INTO suppliers (name,contact_person,phone,email,address) VALUES (?,?,?,?,?)")
            ->execute([input('name'), input('contact_person'), input('phone'), input('email'), input('address')]);
        redirect('suppliers/list');
    }
    render('suppliers/form');
}

function suppliers_edit($id): void {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        db()->prepare("UPDATE suppliers SET name=?, contact_person=?, phone=?, email=?, address=? WHERE supplier_id=?")
            ->execute([input('name'), input('contact_person'), input('phone'), input('email'), input('address'), $id]);
        redirect('suppliers/list');
    }
    $stmt = db()->prepare("SELECT * FROM suppliers WHERE supplier_id=?");
    $stmt->execute([$id]);
    render('suppliers/form', ['supplier' => $stmt->fetch()]);
}

function suppliers_delete($id): void {
    db()->prepare("DELETE FROM suppliers WHERE supplier_id=?")->execute([$id]);
    redirect('suppliers/list');
}