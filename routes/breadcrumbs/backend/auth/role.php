<?php

Breadcrumbs::for('admin.auth.role.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('menus.backend.access.roles.management'), route('admin.auth.role.index'));
});

Breadcrumbs::for('admin.auth.role.create', function ($trail) {
    $trail->parent('admin.auth.role.index');
    $trail->push(__('menus.backend.access.roles.create'), route('admin.auth.role.create'));
});

Breadcrumbs::for('admin.auth.role.edit', function ($trail, $id) {
    $trail->parent('admin.auth.role.index');
    $trail->push(__('menus.backend.access.roles.edit'), route('admin.auth.role.edit', $id));
});


Breadcrumbs::for('admin.auth.permission.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Permission', route('admin.auth.permission.index'));
});

Breadcrumbs::for('admin.auth.permission.create', function ($trail) {
    $trail->parent('admin.auth.permission.index');
    $trail->push('Create', route('admin.auth.permission.create'));
});


Breadcrumbs::for('admin.auth.permission.edit', function ($trail, $id) {
    $trail->parent('admin.auth.permission.index');
    $trail->push('Edit', route('admin.auth.role.edit', $id));
});