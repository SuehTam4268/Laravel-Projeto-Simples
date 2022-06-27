<?php
use App\Http\Controllers\{
    FornecedorController,
    ProdutoController,
    UserController,
};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('/index', UserController::class);
Route::prefix('user')
        ->name('user.')
        ->group(function(){
            
            Route::get('Create',[UserController::class, 'CreateUser'])->name('CreateUser');
            Route::get('Edit/index',[UserController::class, 'EditUserIndex'])->name('edit.index');
            Route::get('Check/user',[UserController::class,'EditUserCheck'])->name('check');
            Route::get('Editar/user',[UserController::class,'EditUser'])->name('edit');
            
            Route::get('Delete/user',[UserController::class,'DeleteUserIndex'])->name('index.delete');
            Route::DELETE('Delete/user',[UserController::class,'DeleteUser'])->name('delete');
        });

Route::prefix('fornecedor')
        ->name('fornecedor.')
        ->group(function(){
            Route::get('Create/Index',[FornecedorController::class,'index'])->name('create.Fornecedor.index');
            Route::POST('Create',[FornecedorController::class,'create'])->name('create');
            Route::get('Edit/index',[FornecedorController::class,'editIndex'])->name('edit.Fornecedor.index');
            Route::post('Check/fornecedor',[FornecedorController::class,'CheckFornecedor'])->name('check');
            Route::post('Edit',[FornecedorController::class,'update'])->name('update');
            Route::get('Delete/Index',[FornecedorController::class,'DeleteIndex'])->name('delete.index');
            Route::post('Delete',[FornecedorController::class, 'destroy'])->name('delete');
        });
Route::prefix('produto')
        ->name('produto.')
        ->group(function(){
            Route::get('Create/index',[ProdutoController::class,'index'])->name('index');
            Route::POST('Create',[ProdutoController::class,'create'])->name('create');
            Route::get('Edit/index',[ProdutoController::class,'editIndex'])->name('edit.index');
        });
Route::get('/', function () {
    return view('welcome');
});
