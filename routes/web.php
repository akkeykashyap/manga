<?php

use App\Http\Controllers\MangaController;
use Illuminate\Support\Facades\Route;





// Route::get('manga',[MangaController::class,'show']);

Route::match(['get','post'],'manga',[MangaController::class,'show'])->name('manga_manga');

Route::get('/manga/{id}', [MangaController::class, 'showDetail'])->name('manga.detail');

route::get('manga/chapters/{id}', [MangaController::class, 'fetchChapters'])->name('manga.chapters');

