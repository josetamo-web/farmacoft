<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\ContactController;
use App\Models\Medicine;
use App\Models\Contact;
use App\Models\Herramienta;
/*
|--------------------------------------------------------------------------
| Rutas Públicas (Navegación general)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $medicines = App\Models\Medicine::latest()->take(5)->get();
    return view('inicio', compact('medicines'));
})->name('home');

Route::get('/servicios', function () {
    return view('servicios');
});

Route::get('/catalogo', [MedicineController::class, 'index'])->name('catalogo');

Route::get('/nosotros', function () {
    return view('nosotros');
});

Route::get('/contacto', function () {
    return view('contacto');
});
Route::post('/contacto', [ContactController::class, 'store'])->name('contacto.store');

/*
|--------------------------------------------------------------------------
| Rutas de Autenticación (Login / Logout)
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Rutas de Registro Público (Solo Clientes)
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
/*
|--------------------------------------------------------------------------
| Rutas Protegidas (Solo Admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Panel de Administrador
    Route::get('/admin/panel', function () {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Acceso denegado: No tienes permisos de administrador.');
        }

        $medicines = App\Models\Medicine::latest()->get();
        $contacts  = App\Models\Contact::latest()->get();

        return view('admin.panel', compact('medicines', 'contacts'));
    })->name('admin.panel');
    // Registrar nuevo usuario desde el Panel Admin
    Route::post('/admin/users', [AuthController::class, 'storeUserByAdmin'])->name('admin.users.store');

    // Rutas para el CRUD de Medicamentos (Solo accesibles para Admin)
    Route::post('/admin/medicines', [MedicineController::class, 'store'])->name('medicines.store');
    Route::put('/admin/medicines/{medicine}', [MedicineController::class, 'update'])->name('medicines.update');
    Route::delete('/admin/medicines/{medicine}', [MedicineController::class, 'destroy'])->name('medicines.destroy');
});


// --- FERRETERÍA EL TORNILLO ---

Route::get('/herramientas', function () {
    $herramientas = Herramienta::all();
    return view('herramientas.index', compact('herramientas'));
});

Route::get('/herramientas/nuevo', function () {
    return view('herramientas.create');
});

Route::post('/herramientas/nuevo', function () {
    $datos = request()->validate([
        'nombre' => 'required',
        'precio' => 'required|integer',
    ], [
        'nombre.required' => 'Escribí el nombre de la herramienta.',
        'precio.required' => 'Escribí el precio de la herramienta.',
        'precio.integer'  => 'El precio se anota solo con cifras.',
    ]);

    Herramienta::create($datos);

    return redirect('/herramientas');
});