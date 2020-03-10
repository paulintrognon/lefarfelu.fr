<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

// PAGES
Breadcrumbs::for('admin.page.list', function ($trail) {
    $trail->push(__('strings.backend.page.list'), route('admin.page.list'));
});
Breadcrumbs::for('admin.page.create', function ($trail) {
    $trail->push(__('strings.backend.page.list'), route('admin.page.list'));
    $trail->push('Nouvelle page', route('admin.page.create'));
});
Breadcrumbs::for('admin.page.edit', function ($trail) {
    $trail->push(__('strings.backend.page.list'), route('admin.page.list'));
    $trail->push('Modifier la page');
});

// FICHIERS
Breadcrumbs::for('admin.file.list', function ($trail) {
    $trail->push(__('strings.backend.file.list'), route('admin.file.list'));
});
Breadcrumbs::for('admin.file.create', function ($trail) {
    $trail->push(__('strings.backend.file.list'), route('admin.file.list'));
    $trail->push('Nouveau fichier', route('admin.file.create'));
});
Breadcrumbs::for('admin.file.edit', function ($trail) {
    $trail->push(__('strings.backend.file.list'), route('admin.file.list'));
    $trail->push('Modifier le fichier');
});

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';
