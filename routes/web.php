<?php


use App\Http\Controllers\Admin\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController; //<---- Import del controller precedentemente creato!
use App\Models\Project;
 
 /* ... */

 Route::get('/', function () {
    $projects = Project ::all();
    return view('welcome' , compact("projects"),  


);
 });


 Route::middleware(['auth'])
 	->prefix('admin') //definisce il prefisso "admin/" per le rotte di questo gruppo
 	->name('admin.') //definisce il pattern con cui generare i nomi delle rotte cioè "admin.qualcosa"
 	->group(function () {
 	
 		//Siamo nel gruppo quindi:
 		// - il percorso "/" diventa "admin/"
 		// - il nome della rotta ->name("dashboard") diventa ->name("admin.dashboard")
 		Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource("projects", ProjectController::class);

 });

 require __DIR__.'/auth.php';
