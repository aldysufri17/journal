<?php

use App\Http\Controllers\Admin\ArticleCategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CareerCategoryController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\OptionPageController;
use App\Http\Controllers\Admin\PageColumnController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\PageSectionController;
use App\Http\Controllers\Admin\PageStyleController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SectionContainerController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CaseGuideController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ModulKerjaController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegulationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TicketJournalController;
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

Auth::routes();

Route::get('/', function () {
    return redirect('/journals');
});

Route::resource('journals', TicketJournalController::class);
Route::get('/journal/stats', [TicketJournalController::class, 'stats'])->name('journals.stats');
Route::get('/regulation', [RegulationController::class, 'index'])->name('regulation.index');
Route::get('/regulation/create', [RegulationController::class, 'create'])->name('regulation.create');
Route::post('/regulation/store', [RegulationController::class, 'store'])->name('regulation.store');
Route::get('/regulation/{id}/edit', [RegulationController::class, 'edit'])->name('regulation.edit');
Route::put('/regulation/{id}', [RegulationController::class, 'update'])->name('regulation.update');
Route::delete('/regulation/{id}', [RegulationController::class, 'destroy'])->name('regulation.destroy');

Route::get('/modul', [ModulKerjaController::class, 'index'])->name('modul.index');
Route::get('/modul/create', [ModulKerjaController::class, 'create'])->name('modul.create');
Route::post('/modul', [ModulKerjaController::class, 'store'])->name('modul.store');
Route::get('/modul/{id}/edit', [ModulKerjaController::class, 'edit'])->name('modul.edit');
Route::put('/modul/{id}', [ModulKerjaController::class, 'update'])->name('modul.update');
Route::delete('/modul/{id}', [ModulKerjaController::class, 'destroy'])->name('modul.destroy');

Route::get('/case-guide', [CaseGuideController::class, 'index'])->name('case-guide.index');
Route::get('/case-guide/create', [CaseGuideController::class, 'create'])->name('case-guide.create');
Route::post('/case-guide', [CaseGuideController::class, 'store'])->name('case-guide.store');
Route::get('/case-guide/{id}/edit', [CaseGuideController::class, 'edit'])->name('case-guide.edit');
Route::put('/case-guide/{id}', [CaseGuideController::class, 'update'])->name('case-guide.update');
Route::delete('/case-guide/{id}', [CaseGuideController::class, 'destroy'])->name('case-guide.destroy');

Route::get('/report', [ReportController::class, 'index'])->name('report.index');
Route::post('/report/update-screenshot', [ReportController::class, 'updateScreenshot'])->name('report.update-screenshot');
