<?php

use App\Models\Wallet\UserAccounts;



Breadcrumbs::for('frontend.user.dashboard', function ($trail) {
    $trail->push('Dashboard', route('frontend.user.dashboard'));
});


Breadcrumbs::for('frontend.user.account', function ($trail) {
    $trail->push('Profile Account', route('frontend.user.account'));
});


Breadcrumbs::for('frontend.user.wallet.index', function ($trail) {
    $trail->push('Wallets', route('frontend.user.wallet.index'));
});

Breadcrumbs::for('frontend.user.wallet.overview', function ($trail) {
    $trail->parent('frontend.user.wallet.index');
    $trail->push('Overview', route('frontend.user.wallet.overview'));
});

Breadcrumbs::for('frontend.user.wallet.cash-in', function ($trail) {
    $trail->parent('frontend.user.wallet.index');
    $trail->push('Cash In', route('frontend.user.wallet.cash-in'));
});


Breadcrumbs::for('frontend.user.wallet.transfer.index', function ($trail) {
    $trail->parent('frontend.user.wallet.index');
    $trail->push('Transfer', route('frontend.user.wallet.transfer.index'));
});

Breadcrumbs::for('frontend.user.wallet.withdraw', function ($trail) {
    $trail->parent('frontend.user.wallet.index');
    $trail->push('Transfer', route('frontend.user.wallet.withdraw'));
});

Breadcrumbs::for('frontend.user.wallet.accounts', function ($trail) {
    $trail->parent('frontend.user.wallet.index');
    $trail->push('Accounts', route('frontend.user.wallet.accounts'));
});

Breadcrumbs::for('frontend.user.wallet.transfer', function ($trail) {
    $trail->parent('frontend.user.wallet.index');
    $trail->push('Transfer', route('frontend.user.wallet.transfer'));
});

Breadcrumbs::for('frontend.user.wallet.account.create', function ($trail) {
    $trail->parent('frontend.user.wallet.index');
    $trail->push('Add Account', route('frontend.user.wallet.account.create'));
});
Breadcrumbs::for('frontend.user.wallet.show', function ($trail, $id) {
    $trail->parent('frontend.user.wallet.accounts');
    $userAcc = UserAccounts::find($id)->name;
    $trail->push(ucwords($userAcc), route('frontend.user.wallet.show',$id));
});


Breadcrumbs::for('frontend.user.wallet.list', function ($trail, $id) {
    $userAcc = UserAccounts::where('account_no', $id)->first()->name;
    $trail->parent('frontend.user.wallet.accounts');
    $trail->push(ucwords($userAcc), route('frontend.user.wallet.list', $id));
});



Breadcrumbs::for('frontend.auth.password.expired', function ($trail) {
    $trail->parent('frontend.user.wallet.index');
    $trail->push('Transfer', route('frontend.auth.password.expired'));
});





// Breadcrumbs::for('frontend.user.wallet.deposit', function ($trail, $name) {
//     $trail->parent('frontend.user.wallet.index');
//     $trail->push(ucwords($name), route('frontend.user.wallet.deposit', $name));
// });

// Breadcrumbs::for('frontend.user.wallet.transactions', function ($trail, $name) {
//     $trail->parent('frontend.user.wallet.index');
//     $trail->push(ucwords($name), route('frontend.user.wallet.transactions', $name));
// });



// Breadcrumbs::for('admin.dashboard', function ($trail) {
//     $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
// });


// Breadcrumbs::for('home.account', function ($trail) {
//     $trail->push('Home', route('home.account'));
// });

// require __DIR__.'/auth.php';
// require __DIR__.'/log-viewer.php';



// Breadcrumbs::for('user.index', function ($trail) {
//     $trail->parent('user.account');
//     $trail->push('sade', route('admin.auth.user.index'));
