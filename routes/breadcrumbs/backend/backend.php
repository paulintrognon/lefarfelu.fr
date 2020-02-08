<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

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

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';
