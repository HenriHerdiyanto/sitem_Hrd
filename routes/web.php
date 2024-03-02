<?php

use Illuminate\Support\Facades\Auth;
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



Route::get('/', function () {

    return view('auth.login');
});



Auth::routes();
Auth::routes(['register' => false]);
// catatan : untuk bisa akses halaman register, pergi ke app/http/middleware/RedirectifAuthenticated.php


// Route::post('/register/store', [App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('register.store');

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:finance'])->group(function () {
    Route::get('/finance/home', [App\Http\Controllers\ReimbursementController::class, 'financeHome'])->name('finance.home');
    Route::get('/finance/reimbursements/edit/{id}', [App\Http\Controllers\ReimbursementController::class, 'financeedit'])->name('finance.reimbursements.edit');
    Route::put('/finance/reimbursements/update/{id}', [App\Http\Controllers\ReimbursementController::class, 'financeupdate'])->name('finance.reimbursements.update');
});


Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [App\Http\Controllers\TodolistController::class, 'Userindex'])->name('home');
    Route::post('/user/store', [App\Http\Controllers\TodolistController::class, 'Userstore'])->name('user.store');
    Route::put('/user/update/{id}', [App\Http\Controllers\TodolistController::class, 'Userupdate'])->name('user.update');
    Route::delete('/user/destroy/{id}', [App\Http\Controllers\TodolistController::class, 'Userdestroy'])->name('user.destroy');

    // profile
    Route::get('/user/profile', [App\Http\Controllers\HomeController::class, 'Profileuser'])->name('user.profile');

    // pendidikan
    Route::post('/user/pendidikan/store', [App\Http\Controllers\PendidikanController::class, 'userstore'])->name('user.pendidikan.store');
    Route::put('/user/pendidikan/update/{id}', [App\Http\Controllers\PendidikanController::class, 'userupdate'])->name('user.pendidikan.update');

    // keluarga
    Route::post('/user/keluarga/store', [App\Http\Controllers\KeluargaController::class, 'userstore'])->name('user.keluarga.store');
    Route::put('/user/keluarga/update/{id}', [App\Http\Controllers\KeluargaController::class, 'userupdate'])->name('user.keluarga.update');

    // absen
    Route::get('/user/absen/index', [App\Http\Controllers\AbsenController::class, 'Userindex'])->name('userabsen.index');
    Route::post('/user/absen/show', [App\Http\Controllers\AbsenController::class, 'Usershow'])->name('UserAbsen.show');
    Route::post('/user/absen/store', [App\Http\Controllers\AbsenController::class, 'Userstore'])->name('UserAbsen.store');
    Route::put('/user/absen/update/{id}', [App\Http\Controllers\AbsenController::class, 'Userupdate'])->name('UserAbsen.update');
    Route::post('/user/absen/izin', [App\Http\Controllers\AbsenController::class, 'Userizin'])->name('UserAbsen.izin');
    Route::post('/user/absen/sakit', [App\Http\Controllers\AbsenController::class, 'Usersakit'])->name('UserAbsen.sakit');

    // cuti
    Route::get('/user/cuti', [App\Http\Controllers\CutiController::class, 'Userindex'])->name('user.cuti.index');
    Route::get('/user/cuti/create', [App\Http\Controllers\CutiController::class, 'Usercreate'])->name('user.cuti.create');
    Route::post('/user/cuti/store', [App\Http\Controllers\CutiController::class, 'Userstore'])->name('user.cuti.store');
    Route::get('/user/cuti/edit/{id}', [App\Http\Controllers\CutiController::class, 'Useredit'])->name('user.cuti.edit');
    Route::put('/user/cuti/update/{id}', [App\Http\Controllers\CutiController::class, 'Userupdate'])->name('user.cuti.update');
    Route::post('/user/cuti/destroy/{id}', [App\Http\Controllers\CutiController::class, 'Userdestroy'])->name('user.cuti.destroy');

    // request budget
    Route::get('/user/budget', [App\Http\Controllers\BudgetController::class, 'Userindex'])->name('user.budget.index');
    Route::get('/user/budget/create', [App\Http\Controllers\BudgetController::class, 'Usercreate'])->name('user.budget.create');
    Route::post('/user/budget/store', [App\Http\Controllers\BudgetController::class, 'Userstore'])->name('user.budget.store');
    Route::get('/user/budget/edit/{id}', [App\Http\Controllers\BudgetController::class, 'Useredit'])->name('user.budget.edit');
    Route::put('/user/budget/update/{id}', [App\Http\Controllers\BudgetController::class, 'Userupdate'])->name('user.budget.update');
    Route::post('/user/budget/destroy/{id}', [App\Http\Controllers\BudgetController::class, 'Userdestroy'])->name('user.budget.destroy');

    // pinjaman user
    Route::get('/user/pinjaman', [App\Http\Controllers\PinjamanController::class, 'userindex'])->name('user.pinjam.index');
    Route::get('/user/pinjaman/create', [App\Http\Controllers\PinjamanController::class, 'usercreate'])->name('user.pinjam.create');
    Route::post('/user/pinjam/store', [App\Http\Controllers\PinjamanController::class, 'userstore'])->name('user.pinjam.store');
    Route::get('/user/pinjam/edit/{id}', [App\Http\Controllers\PinjamanController::class, 'useredit'])->name('user.pinjam.edit');
    Route::put('/user/pinjam/update/{id}', [App\Http\Controllers\PinjamanController::class, 'userupdate'])->name('user.pinjam.update');
    Route::post('/user/pinjam/destroy/{id}', [App\Http\Controllers\PinjamanController::class, 'userdestroy'])->name('user.pinjam.destroy');
    Route::post('/user/history/store', [App\Http\Controllers\HistoryBayarController::class, 'userstore'])->name('user.history.store');

    // lembur user
    Route::get('/user/lembur', [App\Http\Controllers\LemburController::class, 'userindex'])->name('user.lembur.index');
    Route::get('/user/lembur/create', [App\Http\Controllers\LemburController::class, 'usercreate'])->name('user.lembur.create');
    Route::post('/user/lembur/store', [App\Http\Controllers\LemburController::class, 'userstore'])->name('user.lembur.store');
    Route::get('/user/lembur/edit/{id}', [App\Http\Controllers\LemburController::class, 'useredit'])->name('user.lembur.edit');
    Route::put('/user/lembur/update/{id}', [App\Http\Controllers\LemburController::class, 'userupdate'])->name('user.lembur.update');
    Route::post('/user/lembur/destroy/{id}', [App\Http\Controllers\LemburController::class, 'userdestroy'])->name('user.lembur.destroy');

    // reimbursements
    Route::get('/user/reimbursements/index', [App\Http\Controllers\ReimbursementController::class, 'userindex'])->name('user.reimbursements.index');
    Route::get('/user/reimbursements/create', [App\Http\Controllers\ReimbursementController::class, 'usercreate'])->name('user.reimbursements.create');
    Route::post('/user/reimbursements/store', [App\Http\Controllers\ReimbursementController::class, 'userstore'])->name('user.reimbursements.store');
    Route::get('/user/reimbursements/edit/{id}', [App\Http\Controllers\ReimbursementController::class, 'useredit'])->name('user.reimbursements.edit');
    Route::get('/user/reimbursements/cetak/{id}', [App\Http\Controllers\ReimbursementController::class, 'usercetak'])->name('user.reimbursements.cetak');
    Route::put('/user/reimbursements/update/{id}', [App\Http\Controllers\ReimbursementController::class, 'userupdate'])->name('user.reimbursements.update');
    Route::post('/user/reimbursements/destroy/{id}', [App\Http\Controllers\ReimbursementController::class, 'userdestroy'])->name('user.reimbursements.destroy');

    // payroll
    Route::get('/user/payrol', [App\Http\Controllers\PayrollController::class, 'Userindex'])->name('user.payrol.index');
    Route::get('/user/detailPayrolUser/{id}', [App\Http\Controllers\PayrollController::class, 'DetailPayrollindex'])->name('user.payrol.detail');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
-------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin/home', [App\Http\Controllers\TodolistController::class, 'index'])->name('admin.home');
    Route::post('/admin/store', [App\Http\Controllers\TodolistController::class, 'store'])->name('admin.store');
    Route::post('/admin/update/{id}', [App\Http\Controllers\TodolistController::class, 'update'])->name('admin.update');
    Route::delete('/admin/destroy/{id}', [App\Http\Controllers\TodolistController::class, 'destroy'])->name('admin.destroy');

    Route::get('/admin/karyawan/index', [App\Http\Controllers\HomeController::class, 'karyawan'])->name('admin.karyawan.home');
    Route::get('/admin/karyawan/create', [App\Http\Controllers\HomeController::class, 'karyawanCreate'])->name('admin.karyawan.create');
    Route::post('/admin/karyawan/store', [App\Http\Controllers\HomeController::class, 'store'])->name('admin.karyawan.store');
    Route::get('/admin/karyawan/edit/{id}', [App\Http\Controllers\HomeController::class, 'karyawanEdit'])->name('admin.karyawan.edit');
    Route::put('/admin/karyawan/update/{id}', [App\Http\Controllers\HomeController::class, 'karyawanUpdate'])->name('admin.karyawan.update');
    Route::post('/admin/karyawan/delete/{id}', [App\Http\Controllers\HomeController::class, 'karyawanDelete'])->name('admin.karyawan.delete');

    // import excel
    Route::post('import-karyawan', [App\Http\Controllers\HomeController::class, 'import'])->name('admin.import');
    // Route::post('import-karyawan', 'KaryawanController@import');

    // divisi
    Route::get('/divisi/index', [App\Http\Controllers\DivisiController::class, 'index'])->name('divisi.index');
    Route::post('/divisi/store', [App\Http\Controllers\DivisiController::class, 'store'])->name('divisi.store');
    Route::put('/divisi/update/{id}', [App\Http\Controllers\DivisiController::class, 'update'])->name('divisi.update');
    Route::delete('/divisi/destroy/{id}', [App\Http\Controllers\DivisiController::class, 'destroy'])->name('divisi.destroy');

    // payrol
    Route::get('/payroll/index', [App\Http\Controllers\PayrollController::class, 'Adminindex'])->name('payroll.index');
    Route::get('/payroll/show/{id}/{bulan}/{tahun}', [App\Http\Controllers\PayrollController::class, 'show'])->name('payroll.show');
    Route::post('/payroll/store', [App\Http\Controllers\PayrollController::class, 'store'])->name('payroll.store');
    Route::get('/payroll/edit/{id}', [App\Http\Controllers\PayrollController::class, 'edit'])->name('payroll.edit');
    Route::put('/payroll/update/{id}', [App\Http\Controllers\PayrollController::class, 'update'])->name('payroll.update');
    Route::post('/payroll/destroy/{id}', [App\Http\Controllers\PayrollController::class, 'destroy'])->name('payroll.destroy');

    // evaluasi
    Route::get('/evaluasi/index', [App\Http\Controllers\EvaluasiController::class, 'Adminindex'])->name('evaluasi.index');
    Route::get('/evaluasi/edit/{id}', [App\Http\Controllers\EvaluasiController::class, 'edit'])->name('evaluasi.edit');
    Route::put('/evaluasi/update/{id}', [App\Http\Controllers\EvaluasiController::class, 'update'])->name('evaluasi.update');
    Route::post('/evaluasi/destroy/{id}', [App\Http\Controllers\EvaluasiController::class, 'destroy'])->name('evaluasi.destroy');

    // absen
    Route::get('/absen/index', [App\Http\Controllers\AbsenController::class, 'Adminindex'])->name('AdminAbsen.index');
    Route::post('/absen/show', [App\Http\Controllers\AbsenController::class, 'Adminshow'])->name('AdminAbsen.show');

    // pendidikan
    Route::get('/pendidikan/Detail/{id}', [App\Http\Controllers\PendidikanController::class, 'Detail'])->name('pendidikan.detail');

    // inventaris
    Route::get('/inventaris/index', [App\Http\Controllers\InventarisController::class, 'index'])->name('inventaris.index');
    Route::post('/inventaris/store', [App\Http\Controllers\InventarisController::class, 'store'])->name('inventaris.store');
    Route::put('/inventaris/update/{id}', [App\Http\Controllers\InventarisController::class, 'update'])->name('inventaris.update');
    Route::post('/inventaris/destroy/{id}', [App\Http\Controllers\InventarisController::class, 'destroy'])->name('inventaris.destroy');

    // shiff
    Route::get('/shiff/index', [App\Http\Controllers\ShiffController::class, 'index'])->name('shiff.index');
    Route::post('/shiff/store', [App\Http\Controllers\ShiffController::class, 'store'])->name('shiff.store');
    Route::get('/shiff/edit/{id}', [App\Http\Controllers\ShiffController::class, 'edit'])->name('shiff.edit');
    Route::put('/shiff/update/{id}', [App\Http\Controllers\ShiffController::class, 'update'])->name('shiff.update');
    Route::post('/shiff/destroy/{id}', [App\Http\Controllers\ShiffController::class, 'destroy'])->name('shiff.destroy');

    Route::get('/perjalananDinas/index', [App\Http\Controllers\PerjalananDinasController::class, 'Adminindex'])->name('admin.dinas.index');
    // Route::get('/perjalananDinas/create', [App\Http\Controllers\PerjalananDinasController::class, 'create'])->name('dinas.create');
    // Route::post('/perjalananDinas/store', [App\Http\Controllers\PerjalananDinasController::class, 'store'])->name('dinas.store');
    Route::get('/admin/perjalananDinas/edit/{id}', [App\Http\Controllers\PerjalananDinasController::class, 'Adminedit'])->name('admin.dinas.edit');
    Route::put('/admin/perjalananDinas/update/{id}', [App\Http\Controllers\PerjalananDinasController::class, 'Adminupdate'])->name('admin.dinas.update');
    Route::post('/admin/perjalananDinas/destroy/{id}', [App\Http\Controllers\PerjalananDinasController::class, 'Admindestroy'])->name('admin.dinas.destroy');

    // cuti admin
    Route::get('/admin/cuti/index', [App\Http\Controllers\CutiController::class, 'Adminindex'])->name('admin.cuti.index');
    Route::get('/admin/cuti/edit/{id}', [App\Http\Controllers\CutiController::class, 'Adminedit'])->name('admin.cuti.edit');
    Route::put('/admin/cuti/update/{id}', [App\Http\Controllers\CutiController::class, 'Adminupdate'])->name('admin.cuti.update');

    // budget admin
    Route::get('/admin/budget', [App\Http\Controllers\BudgetController::class, 'Adminindex'])->name('admin.budget.index');
    Route::get('/budget/create', [App\Http\Controllers\BudgetController::class, 'create'])->name('budget.create');
    Route::post('/budget/store', [App\Http\Controllers\BudgetController::class, 'store'])->name('budget.store');
    Route::get('/admin/budget/edit/{id}', [App\Http\Controllers\BudgetController::class, 'Adminedit'])->name('admin-budget.edit');
    Route::put('/admin/budget/update/{id}', [App\Http\Controllers\BudgetController::class, 'Adminupdate'])->name('admin-budget.update');
    Route::post('/budget/destroy/{id}', [App\Http\Controllers\BudgetController::class, 'destroy'])->name('budget.destroy');

    // pinjaman admin
    Route::get('/admin/pinjaman/index', [App\Http\Controllers\PinjamanController::class, 'Adminindex'])->name('admin.pinjaman.index');
    Route::get('/admin/pinjaman/edit/{id}', [App\Http\Controllers\PinjamanController::class, 'Adminedit'])->name('admin.pinjaman.edit');
    Route::put('/admin/pinjaman/update/{id}', [App\Http\Controllers\PinjamanController::class, 'Adminupdate'])->name('admin.pinjaman.update');
    Route::post('/admin/pinjaman/destroy/{id}', [App\Http\Controllers\PinjamanController::class, 'Admindestroy'])->name('admin.pinjaman.destroy');
    Route::get('/admin/pinjaman/history/{id}', [App\Http\Controllers\HistoryBayarController::class, 'history'])->name('admin.pinjaman.history');

    // lembur admin
    Route::get('/admin/lembur', [App\Http\Controllers\LemburController::class, 'Adminindex'])->name('admin.lembur.index');
    Route::get('/admin/lembur/edit/{id}', [App\Http\Controllers\LemburController::class, 'Adminedit'])->name('admin.lembur.edit');
    Route::put('/admin/lembur/update/{id}', [App\Http\Controllers\LemburController::class, 'Adminupdate'])->name('admin.lembur.update');
    Route::post('/admin/lembur/destroy/{id}', [App\Http\Controllers\LemburController::class, 'Admindestroy'])->name('admin.lembur.destroy');


    // KPI admin
    Route::get('/admin/kategoriKpi', [App\Http\Controllers\KategoriKpiController::class, 'index'])->name('admin.kategoriKpi.index');
    Route::post('/admin/kategoriKpi/store', [App\Http\Controllers\KategoriKpiController::class, 'store'])->name('admin.kategoriKpi.store');
    Route::put('/admin/kategoriKpi/update/{id}', [App\Http\Controllers\KategoriKpiController::class, 'update'])->name('admin.kategoriKpi.update');
    Route::get('/admin/kategoriKpi/edit/{id}', [App\Http\Controllers\KategoriKpiController::class, 'edit'])->name('admin.kategoriKpi.edit');
    Route::delete('/admin/kategoriKpi/destroy/{id}', [App\Http\Controllers\KategoriKpiController::class, 'destroy'])->name('admin.kategoriKpi.destroy');
    // Change the route method to DELETE
    Route::delete('/kpi/destroy/{id}', [App\Http\Controllers\KpiController::class, 'Admindestroy'])
        ->name('admin.kpi.destroy');


    // infrastruktur admin
    Route::get('/admin/infrastruktur', [App\Http\Controllers\InfrastrukturController::class, 'index'])->name('admin.infrastruktur.index');
    Route::post('/admin/infrastruktur/store', [App\Http\Controllers\InfrastrukturController::class, 'store'])->name('admin.infrastruktur.store');
    // Route::get('/admin/infrastruktur/edit/{id}', [App\Http\Controllers\InfrastrukturController::class, 'edit'])->name('admin.infrastruktur.edit');
    Route::put('/admin/infrastruktur/update/{id}', [App\Http\Controllers\InfrastrukturController::class, 'update'])->name('admin.infrastruktur.update');
    Route::post('/admin/infrastruktur/destroy/{id}', [App\Http\Controllers\InfrastrukturController::class, 'destroy'])->name('admin.infrastruktur.destroy');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/

Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::post('/manager/todolist/store', [App\Http\Controllers\TodolistController::class, 'Managerstore'])->name('todolist.store');
    Route::post('/manager/todolist/update/{id}', [App\Http\Controllers\TodolistController::class, 'Managerupdate'])->name('todolist.update');
    Route::delete('/manager/todolist/destroy/{id}', [App\Http\Controllers\TodolistController::class, 'Managerdestroy'])->name('todolist.destroy');

    Route::get('/manager/home', [App\Http\Controllers\HomeController::class, 'managerHome'])->name('manager.home');
    Route::get('/manager/profile', [App\Http\Controllers\HomeController::class, 'Profile'])->name('manager.profile');
    Route::get('/manager/edit/{id}', [App\Http\Controllers\HomeController::class, 'mangerEdit'])->name('manager.edit');

    // pendidikan
    Route::post('/manager/pendidikan/store', [App\Http\Controllers\PendidikanController::class, 'store'])->name('manager.pendidikan.store');
    Route::put('/manager/pendidikan/update/{id}', [App\Http\Controllers\PendidikanController::class, 'update'])->name('manager.pendidikan.update');
    Route::get('/manager/pendidikan/show/{id}', [App\Http\Controllers\PendidikanController::class, 'show'])->name('manager.pendidikan.show');

    // keluarga
    Route::post('/manager/keluarga/store', [App\Http\Controllers\KeluargaController::class, 'store'])->name('manager.keluarga.store');
    Route::put('/manager/keluarga/update/{id}', [App\Http\Controllers\KeluargaController::class, 'update'])->name('manager.keluarga.update');

    // evaluasi
    Route::get('/manager/create/{id}', [App\Http\Controllers\EvaluasiController::class, 'create'])->name('manager.create');
    Route::post('/manager/store', [App\Http\Controllers\EvaluasiController::class, 'store'])->name('manager.store');
    Route::get('/manager/evaluasi', [App\Http\Controllers\EvaluasiController::class, 'index'])->name('manager.index');

    // absen
    Route::get('/absen', [App\Http\Controllers\AbsenController::class, 'index'])->name('absen.index');
    Route::post('/absen/store', [App\Http\Controllers\AbsenController::class, 'store'])->name('absen.store');
    Route::post('/absen/izin', [App\Http\Controllers\AbsenController::class, 'izin'])->name('absen.izin');
    Route::post('/absen/sakit', [App\Http\Controllers\AbsenController::class, 'sakit'])->name('absen.sakit');
    Route::put('/absen/update/{id}', [App\Http\Controllers\AbsenController::class, 'update'])->name('absen.update');

    // KPI
    Route::get('/kpi', [App\Http\Controllers\KpiController::class, 'index'])->name('kpi.index');
    Route::post('/kpi/store', [App\Http\Controllers\KpiController::class, 'store'])->name('kpi.store');
    Route::get('/kpi/edit/{id}', [App\Http\Controllers\KpiController::class, 'edit'])->name('kpi.edit');
    Route::put('/kpi/update/{id}', [App\Http\Controllers\KpiController::class, 'update'])->name('kpi.update');
    Route::post('/kpi/destroy/{id}', [App\Http\Controllers\KpiController::class, 'destroy'])->name('kpi.destroy');

    // cuti
    Route::get('/cuti', [App\Http\Controllers\CutiController::class, 'index'])->name('cuti.index');
    Route::get('/cuti/create', [App\Http\Controllers\CutiController::class, 'create'])->name('cuti.create');
    Route::post('/cuti/store', [App\Http\Controllers\CutiController::class, 'store'])->name('cuti.store');
    Route::put('/cuti/update/{id}', [App\Http\Controllers\CutiController::class, 'update'])->name('cuti.update');
    Route::get('/cuti/edit/{id}', [App\Http\Controllers\CutiController::class, 'edit'])->name('cuti.edit');
    Route::post('/cuti/destroy/{id}', [App\Http\Controllers\CutiController::class, 'destroy'])->name('cuti.destroy');

    // perjalanan dinas
    Route::get('/perjalananDinas', [App\Http\Controllers\PerjalananDinasController::class, 'index'])->name('dinas.index');
    Route::get('/perjalananDinas/create', [App\Http\Controllers\PerjalananDinasController::class, 'create'])->name('dinas.create');
    Route::post('/perjalananDinas/store', [App\Http\Controllers\PerjalananDinasController::class, 'store'])->name('dinas.store');
    Route::get('/perjalananDinas/edit/{id}', [App\Http\Controllers\PerjalananDinasController::class, 'edit'])->name('dinas.edit');
    Route::put('/perjalananDinas/update/{id}', [App\Http\Controllers\PerjalananDinasController::class, 'update'])->name('dinas.update');
    Route::post('/perjalananDinas/destroy/{id}', [App\Http\Controllers\PerjalananDinasController::class, 'destroy'])->name('dinas.destroy');

    // request budget
    Route::get('/budget', [App\Http\Controllers\BudgetController::class, 'index'])->name('budget.index');
    Route::get('/budget/create', [App\Http\Controllers\BudgetController::class, 'create'])->name('budget.create');
    Route::post('/budget/store', [App\Http\Controllers\BudgetController::class, 'store'])->name('budget.store');
    Route::get('/budget/edit/{id}', [App\Http\Controllers\BudgetController::class, 'edit'])->name('budget.edit');
    Route::put('/budget/update/{id}', [App\Http\Controllers\BudgetController::class, 'update'])->name('budget.update');
    Route::post('/budget/destroy/{id}', [App\Http\Controllers\BudgetController::class, 'destroy'])->name('budget.destroy');

    // pinjaman manager
    Route::get('/manager/pinjaman', [App\Http\Controllers\PinjamanController::class, 'index'])->name('manager.pinjam.index');
    Route::get('/manager/pinjaman/create', [App\Http\Controllers\PinjamanController::class, 'create'])->name('manager.pinjam.create');
    Route::post('/manager/pinjam/store', [App\Http\Controllers\PinjamanController::class, 'store'])->name('manager.pinjam.store');
    Route::get('/manager/pinjam/edit/{id}', [App\Http\Controllers\PinjamanController::class, 'edit'])->name('manager.pinjam.edit');
    Route::put('/manager/pinjam/update/{id}', [App\Http\Controllers\PinjamanController::class, 'update'])->name('manager.pinjam.update');
    Route::post('/manager/pinjam/destroy/{id}', [App\Http\Controllers\PinjamanController::class, 'destroy'])->name('manager.pinjam.destroy');
    Route::post('/manager/history/store', [App\Http\Controllers\HistoryBayarController::class, 'store'])->name('manager.history.store');

    // lembur manager
    Route::get('/manager/lembur', [App\Http\Controllers\LemburController::class, 'index'])->name('manager.lembur.index');
    Route::get('/manager/lembur/create', [App\Http\Controllers\LemburController::class, 'create'])->name('manager.lembur.create');
    Route::post('/manager/lembur/store', [App\Http\Controllers\LemburController::class, 'store'])->name('manager.lembur.store');
    Route::get('/manager/lembur/edit/{id}', [App\Http\Controllers\LemburController::class, 'edit'])->name('manager.lembur.edit');
    Route::put('/manager/lembur/update/{id}', [App\Http\Controllers\LemburController::class, 'update'])->name('manager.lembur.update');
    Route::post('/manager/lembur/destroy/{id}', [App\Http\Controllers\LemburController::class, 'destroy'])->name('manager.lembur.destroy');

    // reimbursements
    Route::get('/reimbursements/index', [App\Http\Controllers\ReimbursementController::class, 'index'])->name('reimbursements.index');
    Route::get('/reimbursements/create', [App\Http\Controllers\ReimbursementController::class, 'create'])->name('reimbursements.create');
    Route::post('/reimbursements/store', [App\Http\Controllers\ReimbursementController::class, 'store'])->name('reimbursements.store');
    Route::get('/reimbursements/edit/{id}', [App\Http\Controllers\ReimbursementController::class, 'edit'])->name('reimbursements.edit');
    Route::put('/reimbursements/update/{id}', [App\Http\Controllers\ReimbursementController::class, 'update'])->name('reimbursements.update');
    Route::post('/reimbursements/destroy/{id}', [App\Http\Controllers\ReimbursementController::class, 'destroy'])->name('reimbursements.destroy');

    Route::get('/payrollManager/index', [App\Http\Controllers\PayrollController::class, 'indexManager'])->name('manager.payroll');
    Route::get('/payroll/detail/{id}', [App\Http\Controllers\PayrollController::class, 'DetailManager'])->name('detail.payroll');
});
