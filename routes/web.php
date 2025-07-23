<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home page
Route::get('/', function () {
    return view('home');
})->name('home');

// Authentication routes (basic implementation)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');



Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/registration-success', function () {
    return view('auth.registration-success');
})->name('registration.success');

Route::post('/logout', function () {
    // TODO: Implement logout logic
    return redirect()->route('home');
})->name('logout');

// Public routes
Route::get('/stands', function () {
    return view('stands.liste');
})->name('stands.index');

Route::get('/stands/{id}', function ($id) {
    return view('stands.detail', ['stand_id' => $id]);
})->name('stands.show');

// Dashboard routes
Route::get('/dashboard', function () {
    // Simple dashboard for now - you can add role checking later
    return view('dashboard.index')->with('dashboard_type', 'entrepreneur');
})->name('dashboard');

// Cart routes
Route::get('/panier', function () {
    return view('cart.panier');
})->name('cart.index');

Route::post('/panier/add', function () {
    return response()->json(['success' => true]);
})->name('cart.add');

Route::put('/panier/update/{id}', function ($id) {
    return response()->json(['success' => true]);
})->name('cart.update');

Route::delete('/panier/remove/{id}', function ($id) {
    return response()->json(['success' => true]);
})->name('cart.remove');

Route::post('/panier/checkout', function () {
    return redirect()->route('home');
})->name('cart.checkout');

// Entrepreneur routes
Route::prefix('entrepreneur')->name('entrepreneur.')->group(function () {
    Route::get('/produits', function () {
        return view('entrepreneur.produits.index');
    })->name('produits.index');

    Route::get('/produits/create', function () {
        return view('entrepreneur.produits.create');
    })->name('produits.create');

    Route::post('/produits', function () {
        return redirect()->route('entrepreneur.produits.index');
    })->name('produits.store');

    Route::get('/produits/{id}/edit', function ($id) {
        return view('entrepreneur.produits.edit', ['product_id' => $id]);
    })->name('produits.edit');

    Route::put('/produits/{id}', function ($id) {
        return redirect()->route('entrepreneur.produits.index');
    })->name('produits.update');

    Route::delete('/produits/{id}', function ($id) {
        return response()->json(['success' => true]);
    })->name('produits.destroy');

    Route::get('/commandes', function () {
        return view('entrepreneur.commandes.index');
    })->name('commandes.index');

    Route::get('/commandes/{id}', function ($id) {
        return view('entrepreneur.commandes.show', ['order_id' => $id]);
    })->name('commandes.show');

    Route::get('/stand/edit', function () {
        return view('entrepreneur.stand.edit');
    })->name('stand.edit');

    Route::put('/stand', function () {
        return redirect()->route('entrepreneur.stand.edit');
    })->name('stand.update');
});

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/stands', function () {
        return view('admin.stands.index');
    })->name('stands.index');

    Route::get('/stands/pending', function () {
        return view('admin.stands.pending');
    })->name('stands.pending');

    Route::get('/stands/{id}', function ($id) {
        return view('admin.stands.show', ['stand_id' => $id]);
    })->name('stands.show');

    Route::post('/stands/{id}/approve', function ($id) {
        return response()->json(['success' => true]);
    })->name('stands.approve');

    Route::post('/stands/{id}/reject', function ($id) {
        return response()->json(['success' => true]);
    })->name('stands.reject');

    Route::get('/users', function () {
        return view('admin.users.index');
    })->name('users.index');

    Route::get('/users/{id}', function ($id) {
        return view('admin.users.show', ['user_id' => $id]);
    })->name('users.show');
});

// API routes for AJAX
Route::prefix('api')->group(function () {
    Route::get('/search/stands', function () {
        return response()->json(['results' => []]);
    })->name('api.search.stands');

    Route::get('/search/products', function () {
        return response()->json(['results' => []]);
    })->name('api.search.products');

    Route::get('/stats/entrepreneur', function () {
        return response()->json([
            'produits_count' => 12,
            'commandes_count' => 34,
            'revenus' => 1245,
            'note_moyenne' => 4.8
        ]);
    })->name('api.stats.entrepreneur');

    Route::get('/stats/admin', function () {
        return response()->json([
            'stands_total' => 28,
            'stands_pending' => 5,
            'utilisateurs_count' => 142,
            'commandes_total' => 876
        ]);
    })->name('api.stats.admin');
});

// Fallback route
Route::fallback(function () {
    return view('errors.404');
});
require __DIR__.'/auth.php';
