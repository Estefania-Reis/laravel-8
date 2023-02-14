<?php

use App\Models\Ikan;
use App\Models\Ikanoan;
use App\Models\Employee;
use App\Models\Distribuisaun;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeeController;
use App\Http\Controllers\HapaController;
use App\Http\Controllers\IkanController;
use App\Http\Controllers\SucoController;
use App\Http\Controllers\KolamController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostoController;
use App\Http\Controllers\AldeiaController;
use App\Http\Controllers\LelaunController;
use App\Http\Controllers\IkanoanController;
use App\Http\Controllers\IkansrtController;
use App\Http\Controllers\KlienteController;
use App\Http\Controllers\TbkolamController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\TipuikanController;
use App\Http\Controllers\EstruturaController;
use App\Http\Controllers\HahanikanController;
use App\Http\Controllers\IkantolunController;
use App\Http\Controllers\IncubatorController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\OrijemikanController;
use App\Http\Controllers\KlientegrupoController;
use App\Http\Controllers\DistribuisaunController;
use App\Http\Controllers\TestingHelperController;
use App\Http\Controllers\NiveleducasaunController;
use App\Http\Controllers\IkannurserydController;
use App\Http\Controllers\IkantsrtdController;
use App\Http\Controllers\FohanikanController;
use App\Http\Controllers\IKanbdController;
use App\Http\Controllers\IkanbroodController;
use App\Http\Controllers\TipukolamController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\CandidatoikanbController;
use App\Http\Controllers\CandidatoikanbdController;
use App\Http\Controllers\IkantolundController;
use App\Http\Controllers\IkannurserynController;
use App\Http\Controllers\NurseryndController;
use App\Http\Controllers\FertilizanteController;
use App\Http\Controllers\IkankompradoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KualidadebeeController;
use App\Http\Controllers\EletrisidadeController;
use App\Http\Controllers\ImportasaunfiniController;
use App\Http\Controllers\PediduController;
use Stevebauman\Location\Facades\Location;

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

//Dashboard
Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/relatoriu', [DashboardController::class, 'relatoriu'])->name('relatoriu')->middleware('auth');
Route::get('/export-estatistiku-produsaun-ib', [DashboardController::class, 'exportpdf'])->name('export-estatistiku-produsaun-ib');
Route::get('/export-estatistiku-produsaun-inur', [DashboardController::class, 'exportnurpdf'])->name('export-estatistiku-produsaun-inur');
Route::get('/export-estatistiku-distribuisaun', [DashboardController::class, 'exportdispdf'])->name('export-estatistiku-distribuisaun');

// Route::get('/', function () { dd(Location::get());});
// Route::get('/', function () {
    
//     // $totalikan_inan = Ikan::where('id', '$id')->sum('kuantidade_ikan_inan');
//     // $totalikan_aman = Ikan::where('id', 'null')->sum();
//     // $totalikan_oan = Ikanoan::where('kuantidade', 'null')->sum();
//     //dashboard
//     return view('welcome');
// })->middleware('auth');


//Series
Route::get('/series', [SerieController::class, 'index'])->name('series')->middleware('auth');
Route::get('/insertserie', [SerieController::class, 'create'])->name('insertserie');
Route::post('/saveserie', [SerieController::class,'store'])->name('saveserie');
Route::get('/export-kodigu', [SerieController::class, 'exportpdf'])->name('export-kodigu');

//Employee
Route::get('/employee', [EmployeeController::class, 'index'])->name('employee')->middleware('auth');
Route::get('/tambahpegawai', [EmployeeController::class, 'create'])->name('tambahpegawai');
Route::post('/insertdata', [EmployeeController::class, 'store'])->name('insertdata');
Route::get('/tampilkandata/{id}', [EmployeeController::class, 'edit'])->name('tampilkandata');
Route::put('/updatedataemp/{id}', [EmployeeController::class, 'update'])->name('updatedataemp');
Route::get('/delete1/{id}', [EmployeeController::class, 'delete'])->name('delete1');
Route::get('/estrutura', [EmployeeController::class, 'indexest'])->name('estrutura')->middleware('auth');
Route::get('/exportpdf', [EmployeeController::class, 'exportpdf'])->name('exportpdf');
Route::get('/exportexcel', [EmployeeController::class, 'exportexcel'])->name('exportexcel');
Route::post('/importexcel', [EmployeeController::class, 'importexcel'])->name('importexcel');

//Pedidu
Route::get('/pedidu', [PediduController::class, 'index'])->name('pedidu')->middleware('auth');
Route::get('/aumenta-pedidu', [PediduController::class, 'create'])->name('aumenta-pedidu');
Route::post('/insert-pedidu', [PediduController::class, 'store'])->name('insert-pedidu');
Route::get('/edit-pedidu/{id}', [PediduController::class, 'edit'])->name('edit-pedidu');
Route::put('/update-pedidu/{id}', [PediduController::class, 'update'])->name('update-pedidu');
Route::get('/del-pedidu/{id}', [PediduController::class, 'delete'])->name('del-pedidu');
Route::get('/export-pedidu-pdf', [PediduController::class, 'exportpdf'])->name('export-pedidu-pdf');

// Route::get('/exportexcel', [PediduController::class, 'exportexcel'])->name('exportexcel');

//Login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');
//Utilizador
Route::get('/utilizador', [LoginController::class, 'index'])->name('utilizador');
Route::get('/registo', [LoginController::class, 'registo'])->name('registo');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');
Route::get('/edituser/{id}', [LoginController::class, 'edit'])->name('edituser');
Route::post('/updateuser/{id}', [LoginController::class, 'update'])->name('updateuser');
Route::get('/reset-pw/{id}', [LoginController::class, 'resetpw'])->name('resetpw');
Route::post('/update-pw/{id}', [LoginController::class, 'updatepw'])->name('updatepw');
Route::get('/deleteuser/{id}', [LoginController::class, 'delete'])->name('deleteuser');
Route::get('/export-user', [LoginController::class, 'exportpdf1'])->name('export-user');
//logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Importasaun 
Route::get('/importasaun_fini', [ImportasaunfiniController::class, 'index'])->name('importasaun_fini')->middleware('auth');
Route::get('/aumenta_importasaun_fini', [ImportasaunfiniController::class, 'create'])->name('aumenta_importasaun_fini');
Route::post('/insert_importasaun_fini', [ImportasaunfiniController::class, 'store'])->name('insert_importasaun_fini');
Route::get('/edit_importasaun_fini/{id}', [ImportasaunfiniController::class, 'edit'])->name('edit_importasaun_fini');
Route::post('/update_importasaun_fini/{id}', [ImportasaunfiniController::class, 'update'])->name('update_importasaun_fini');
Route::get('/delete_importasaun_fini/{id}', [ImportasaunfiniController::class, 'delete'])->name('delete_importasaun_fini');
Route::get('/export-importasaun-fini', [ImportasaunfiniController::class, 'exportpdf'])->name('export-importasaun-fini');

//Kandidatu Ikan brood 
Route::get('/kandidatu_ikan', [CandidatoikanbController::class, 'index'])->name('kandidatu_ikan')->middleware('auth');
Route::get('/aumentakandidatu', [CandidatoikanbController::class, 'create'])->name('aumentakandidatu');
Route::post('/insertkandidatu', [CandidatoikanbController::class, 'store'])->name('insertkandidatu');
Route::get('/kandidatu_ikanedit/{id}', [CandidatoikanbController::class, 'edit'])->name('kandidatu_ikanedit');
Route::post('/updatekandidatu_ikan/{id}', [CandidatoikanbController::class, 'update'])->name('updatekandidatu_ikan');
Route::get('/deletekandidatu_ikan/{id}', [CandidatoikanbController::class, 'delete'])->name('deletekandidatu_ikan');
Route::get('/export-kandidatu-ikan-brood', [CandidatoikanbController::class, 'exportpdf'])->name('export-kandidatu-ikan-brood');
Route::get('/kandidatu_ikan_dim', [CandidatoikanbdController::class, 'index'])->name('kandidatu_ikan_dim')->middleware('auth');
Route::get('/deletekandidatu_ikandim/{id}', [CandidatoikanbdController::class, 'delete'])->name('deletekandidatu_ikandim');
Route::get('/export-kandidatu-ikan-brood-diminuidu', [CandidatoikanbdController::class, 'exportpdf'])->name('export-kandidatu-ikan-brood-diminuidu');

//Kandidatu Ikan Diminuisaun (sdk hotu)
// Route::get('/aumentakandidatudim', [CandidatoikanbdController::class, 'create'])->name('aumentakandidatudim');
// Route::post('/insertkandidatudim', [CandidatoikanbdController::class, 'store'])->name('insertkandidatudim');
// Route::get('/kandidatu_ikandimedit/{id}', [CandidatoikanbdController::class, 'edit'])->name('kandidatu_ikandimedit');
// Route::post('/updatekandidatu_ikandim/{id}', [CandidatoikanbdController::class, 'update'])->name('updatekandidatu_ikandim');

//ikan
Route::get('/data_ikan/index', [IkanbroodController::class, 'index'])->name('ikan')->middleware('auth');
Route::get('/data_ikan/aumentadata', [IkanbroodController::class, 'create']);
Route::post('/insertdataikan', [IkanbroodController::class, 'store'])->name('insertdataikan');
Route::get('/show_dataikan/{id}', [IkanbroodController::class, 'show']);
Route::get('/data_ikan/edit/{id}', [IkanbroodController::class, 'edit']);
Route::post('/updatedataikan/{id}', [IkanbroodController::class, 'update'])->name('updatedataikan');
Route::get('/deleteikan/{id}', [IkanbroodController::class, 'delete'])->name('deleteikan');
Route::get('/export-ikan-brood', [IkanbroodController::class, 'exportpdf'])->name('export-ikan-brood');
Route::get('/ikanmate/index', [IKanbdController::class, 'index'])->name('ikanmate')->middleware('auth');
Route::get('/deleteikanmate/{id}', [IKanbdController::class, 'delete'])->name('deleteikanmate');
Route::get('/export-ikan-brood-diminuidu', [IKanbdController::class, 'exportpdf'])->name('export-ikan-brood-diminuidu');

//ikan Diminuidu
// Route::get('/ikanmate/aumentadata', [IKanbdController::class, 'create']);
// Route::post('/insertikanmate', [IKanbdController::class, 'store'])->name('insertikanmate');
// Route::get('/ikanmate/edit/{id}', [IKanbdController::class, 'edit']);
// Route::post('/updateikanmate/{id}', [IKanbdController::class, 'update'])->name('updateikanmate');

//ikan Oan
Route::get('/data_ikan_oan/index', [IkanoanController::class, 'index'])->name('ikanoan')->middleware('auth');
Route::get('/data_ikan_oan/aumentadata', [IkanoanController::class, 'create'])->name('aumentaioan');
Route::post('/insertdataioan', [IkanoanController::class, 'store'])->name('insertdataioan');
Route::get('/data_ikan_oan/edit/{id}', [IkanoanController::class, 'edit'])->name('editioan');
Route::post('/updatedataioan/{id}', [IkanoanController::class, 'update'])->name('updatedataioan');
Route::get('/deleteioan/{id}', [IkanoanController::class, 'delete'])->name('deleteioan');
Route::get('/export-ikan-oan', [IkanoanController::class, 'exportpdf'])->name('export-ikan-oan');
Route::get('/ikanoanmate/index', [IkannurserydController::class, 'index'])->name('ikanoanmate')->middleware('auth');
Route::get('/deleteikanoanmate/{id}', [IkannurserydController::class, 'delete'])->name('deleteikanoanmate');
Route::get('/export-ikan-oan-diminuidu', [IkannurserydController::class, 'exportpdf'])->name('export-ikan-oan-diminuidu');

//ikan Oan Diminuidu
// Route::get('/ikanoanmate/aumentadata', [IkannurserydController::class, 'create']);
// Route::post('/insertikanoanmate', [IkannurserydController::class, 'store'])->name('insertikanoanmate');
// Route::get('/ikanoanmate/edit/{id}', [IkannurserydController::class, 'edit']);
// Route::post('/updateikanoanmate/{id}', [IkannurserydController::class, 'update'])->name('updateikanoanmate');

//ikan Nursery None Mono Sex
Route::get('/ikannurseryn/index', [IkannurserynController::class, 'index'])->name('ikannurseryn')->middleware('auth');
Route::get('/ikannurseryn/aumentadata', [IkannurserynController::class, 'create']);
Route::post('/insertikannurseryn', [IkannurserynController::class, 'store'])->name('insertikannurseryn');
Route::get('/ikannurseryn/edit/{id}', [IkannurserynController::class, 'edit']);
Route::post('/updateikannurseryn/{id}', [IkannurserynController::class, 'update'])->name('updateikannurseryn');
Route::get('/deleteikannurseryn/{id}', [IkannurserynController::class, 'delete'])->name('deleteikannurseryn');
Route::get('/export-ikan-nursery-none-mono-sex', [IkannurserynController::class, 'exportpdf'])->name('export-ikan-nursery-none-mono-sex');
Route::get('/ikannurserynd/index', [NurseryndController::class, 'index'])->name('ikannurserynd')->middleware('auth');
Route::get('/deleteikannurserynd/{id}', [NurseryndController::class, 'delete'])->name('deleteikannurserynd');
Route::get('/export-ikan-nursery-none-mono-sex-diminuidu', [NurseryndController::class, 'exportpdf'])->name('export-ikan-nursery-none-mono-sex-diminuidu');

//ikan Nursery None Mono Sex Diminui
// Route::get('/ikannurserynd/aumentadata', [NurseryndController::class, 'create']);
// Route::post('/insertikannurserynd', [NurseryndController::class, 'store'])->name('insertikannurserynd');
// Route::get('/ikannurserynd/edit/{id}', [NurseryndController::class, 'edit']);
// Route::post('/updateikannurserynd/{id}', [NurseryndController::class, 'update'])->name('updateikannurserynd');


//ikan Srt Diminuidu
Route::get('/ikansrtmate/index', [IkantsrtdController::class, 'index'])->name('ikansrtmate')->middleware('auth');
Route::get('/ikansrtmate/aumentadata', [IkantsrtdController::class, 'create']);
Route::post('/insertikansrtmate', [IkantsrtdController::class, 'store'])->name('insertikansrtmate');
Route::get('/ikansrtmate/edit/{id}', [IkantsrtdController::class, 'edit']);
Route::post('/updateikansrtmate/{id}', [IkantsrtdController::class, 'update'])->name('updateikansrtmate');
Route::get('/deleteikansrtmate/{id}', [IkantsrtdController::class, 'destroy'])->name('deleteikansrtmate');
Route::get('/export-ikan-srt-diminuidu', [IkantsrtdController::class, 'exportpdf'])->name('export-ikan-srt-diminuidu');

//ikan Tolun Diminuidu
Route::get('/ikantolund', [IkantolundController::class, 'index'])->name('ikantolund')->middleware('auth');
Route::get('/ikantolund/aumentadata', [IkantolundController::class, 'create']);
Route::post('/insertikantolund', [IkantolundController::class, 'store'])->name('insertikantolund');
Route::get('/ikantolund/edit/{id}', [IkantolundController::class, 'edit']);
Route::post('/updateikantolund/{id}', [IkantolundController::class, 'update'])->name('updateikantolund');
Route::get('/deleteikantolund/{id}', [IkantolundController::class, 'destroy'])->name('deleteikantolund');
Route::get('/export-ikan-tolun-diminuidu', [IkantolundController::class, 'exportpdf'])->name('export-ikan-tolun-diminuidu');

//ikan Tolun
Route::get('/ikanTolun/index', [IkantolunController::class, 'index'])->name('ikan_tolun')->middleware('auth');
Route::get('/ikanTolun/aumentadata', [IkantolunController::class, 'create']);
Route::post('/insertdataikantolun', [IkantolunController::class, 'store'])->name('insertdataikantolun');
Route::get('/ikanTolun/edit/{id}', [IkantolunController::class, 'edit']);
Route::post('/updatedataikantolun/{id}', [IkantolunController::class, 'update'])->name('updatedataikantolun');
Route::get('/deleteikantolun/{id}', [IkantolunController::class, 'delete'])->name('deleteikantolun');
Route::get('/export-ikan-tolun', [IkantolunController::class, 'exportpdf'])->name('export-ikan-tolun');

//ikan Srt
Route::get('/data_ikan_srt/index', [IkansrtController::class, 'index'])->name('ikansrt')->middleware('auth');
Route::get('/data_ikan_srt/aumentadata', [IkansrtController::class, 'create'])->name('ikansrt_aumenta');
Route::post('/getHapa', [IkansrtController::class, 'getHapa'])->name('getHapa');
Route::post('/insertdataisrt', [IkansrtController::class, 'store'])->name('insertdataisrt');
Route::get('/data_ikan_srt/edit/{id}', [IkansrtController::class, 'edit']);
Route::post('/updatedataisrt/{id}', [IkansrtController::class, 'update'])->name('updatedataisrt');
Route::get('/deleteisrt/{id}', [IkansrtController::class, 'delete'])->name('deleteisrt');
Route::get('/export-ikan-srt', [IkansrtController::class, 'exportpdf'])->name('export-ikan-srt');

//Helper Employee Id Generate
Route::get('test',[TestingHelperController::class, 'index']);

//Tipu Ikan
Route::get('/data_extra/tipu_ikan/index', [TipuikanController::class, 'indextipu'])->name('indextipu')->middleware('auth');
Route::get('/data_extra/tipu_ikan/aumentadata', [TipuikanController::class, 'create']);
Route::post('/insertdatatipu', [TipuikanController::class, 'store'])->name('insertdatatipu');
Route::get('/data_extra/tipu_ikan/edit/{id}', [TipuikanController::class, 'edit']);
Route::post('/updatedatatipu/{id}', [TipuikanController::class, 'update'])->name('updatedatatipu');
Route::get('/delete_tipu/{id}', [TipuikanController::class, 'delete'])->name('delete_tipu');
Route::get('/export-tipu-ikan', [TipuikanController::class, 'exportpdf'])->name('export-tipu-ikan');

//Orijem Ikan
Route::get('/data_extra/orijem/index', [OrijemikanController::class, 'index'])->name('indexori')->middleware('auth');
Route::get('/data_extra/orijem/aumentadata', [OrijemikanController::class, 'create']);
Route::post('/insertdataori', [OrijemikanController::class, 'store'])->name('insertdataori');
Route::get('/data_extra/orijem/edit/{id}', [OrijemikanController::class, 'edit'])->name('editori');
Route::post('/updatedataori/{id}', [OrijemikanController::class, 'update'])->name('updatedataori');
Route::get('/delete_orijem/{id}', [OrijemikanController::class, 'delete'])->name('delete_orijem');
Route::get('/export-orijem-ikan', [OrijemikanController::class, 'exportpdf'])->name('export-orijem-ikan');

//Kliente Individual
Route::get('/klientes/individual/index', [KlienteController::class, 'indexind'])->name('indexind')->middleware('auth');
Route::get('/klientes/individual/aumentadataindividual', [KlienteController::class, 'create'])->name('aumentaindividual');
Route::post('/getPosto1', [KlienteController::class, 'getPosto'])->name('getPosto1');
Route::post('/getSuco1', [KlienteController::class, 'getSuco'])->name('getSuco1');
Route::post('/getAldeia1', [KlienteController::class, 'getAldeia'])->name('getAldeia1');
Route::post('/insertdataind', [KlienteController::class, 'store'])->name('insertdataind');
Route::get('/klientes/individual/edit/{id}', [KlienteController::class, 'edit'])->name('editind');
Route::put('/updatedataind/{id}', [KlienteController::class, 'update'])->name('updatedataind');
Route::get('/deleteind/{id}', [KlienteController::class, 'delete'])->name('deleteind');
Route::get('/export-benefisiariu-individual', [KlienteController::class, 'exportpdf'])->name('export-benefisiariu-individual');

//Kliente Grupo
Route::get('/klientes/grupo/index', [KlientegrupoController::class, 'indexgp'])->name('indexgp')->middleware('auth');
Route::get('/klientes/grupo/aumentadata', [KlientegrupoController::class, 'create'])->name('aumentagp');
Route::post('/getPosto2', [KlientegrupoController::class, 'getPosto'])->name('getPosto2');
Route::post('/getSuco2', [KlientegrupoController::class, 'getSuco'])->name('getSuco2');
Route::post('/getAldeia2', [KlientegrupoController::class, 'getAldeia'])->name('getAldeia2');
Route::post('/insertdatagp', [KlientegrupoController::class, 'store'])->name('insertdatagp');
Route::get('/klientes/grupo/edit/{id}', [KlientegrupoController::class, 'editgp'])->name('editgp');
Route::put('/updategp/{id}', [KlientegrupoController::class, 'updategp'])->name('updategp');
Route::get('/deletegp/{id}', [KlientegrupoController::class, 'delete'])->name('deletegp');
Route::get('/export-benefisiariu-grupu', [KlientegrupoController::class, 'exportpdf'])->name('export-benefisiariu-grupu');

//Operasaun Distribuisaun la uza
Route::get('/operasaun/distribuisaun/index', [DistribuisaunController::class, 'index'])->name('indexdist')->middleware('auth');
Route::get('/operasaun/distribuisaun/aumentadata', [DistribuisaunController::class, 'create'])->name('aumentadist');
// Route::post('/getPosto', [DistribuisaunController::class, 'getPosto'])->name('getPosto');
// Route::post('/getSuco', [DistribuisaunController::class, 'getSuco'])->name('getSuco');
// Route::post('/getAldeia', [DistribuisaunController::class, 'getAldeia'])->name('getAldeia');
Route::post('/insertdatadist', [DistribuisaunController::class, 'store'])->name('insertdatadist');
Route::get('/operasaun/distribuisaun/edit/{id}', [DistribuisaunController::class, 'edit'])->name('editdist');
Route::post('/updatedatadist/{id}', [DistribuisaunController::class, 'update'])->name('updatedatadist');
Route::get('/deletedist/{id}', [DistribuisaunController::class, 'delete'])->name('deletedist');
Route::get('/export-distribuisaun', [DistribuisaunController::class, 'exportpdf'])->name('export-distribuisaun');

//Operasaun Lelaun
Route::get('/lelaun', [LelaunController::class, 'index'])->name('lelaun')->middleware('auth');
Route::get('/aumentadatalelaun', [LelaunController::class, 'create'])->name('aumentadatalelaun');
Route::post('/insertdatalel', [LelaunController::class, 'store'])->name('insertdatalel');
Route::get('/lelaun/edit/{id}', [LelaunController::class, 'edit'])->name('editlel');
Route::post('/updatedatalel/{id}', [LelaunController::class, 'update'])->name('updatedatalel');
Route::get('/deletelel/{id}', [LelaunController::class, 'delete'])->name('deletelel');
Route::get('/export-lelaun', [LelaunController::class, 'exportpdf'])->name('export-lelaun');

//Operasaun Nota kompras
Route::get('/nota_kompras', [IkankompradoController::class, 'index'])->name('nota_kompras')->middleware('auth');
Route::get('/aumentanota', [IkankompradoController::class, 'create'])->name('aumentanota');
Route::post('/insertnota', [IkankompradoController::class, 'store'])->name('insertnota');
Route::get('/nota/edit/{id}', [IkankompradoController::class, 'edit'])->name('editnota');
Route::post('/updatenota/{id}', [IkankompradoController::class, 'update'])->name('updatenota');
Route::get('/deletenota/{id}', [IkankompradoController::class, 'delete'])->name('deletenota');
Route::get('/export-nota-kompras', [IkankompradoController::class, 'exportpdf'])->name('export-nota-kompras');

//Manutensaun
//Kolam
Route::get('/manutensaun/kolam/index', [KolamController::class, 'indexkolam'])->name('indexkolam')->middleware('auth');
Route::get('/manutensaun/kolam/aumentadata', [KolamController::class, 'create'])->name('aumentadatakolam');
Route::post('/insertdatakolam', [KolamController::class, 'store'])->name('insertdatakolam');
Route::get('/manutensaun/kolam/edit/{id}', [KolamController::class, 'editkolam'])->name('editkolam');
Route::post('/updatedatakolam/{id}', [KolamController::class, 'updatedatakolam'])->name('updatedatakolam');
Route::get('deletekol/{id}', [KolamController::class, 'delete'])->name('deletekol');
Route::get('/export-kolam', [KolamController::class, 'exportpdf'])->name('export-kolam');

//Tipu Kolam La uza
Route::get('/tipukolam', [TipukolamController::class, 'index'])->name('tipukolam')->middleware('auth');
Route::get('/aumentatipukolam', [TipukolamController::class, 'create'])->name('aumentatipukolam');
Route::post('/inserttipukolam', [TipukolamController::class, 'store'])->name('inserttipukolam');
Route::get('/edittipukolam/{id}', [TipukolamController::class, 'edit'])->name('edittipukolam');
Route::post('/updatetipukolam/{id}', [TipukolamController::class, 'update'])->name('updatetipukolam');
Route::get('deletetipukol/{id}', [TipukolamController::class, 'delete'])->name('deletetipukol');
Route::get('/export-tipu-kolam', [TipukolamController::class, 'exportpdf'])->name('export-tipu-kolam');

//Hapa
Route::get('/manutensaun/hapa/index', [HapaController::class, 'indexhapa'])->name('indexhapa')->middleware('auth');
Route::get('/manutensaun/hapa/aumentadata', [HapaController::class, 'create'])->name('aumentadatahapa');
Route::post('/insertdatahapa', [HapaController::class, 'store'])->name('insertdatahapa');
Route::get('/manutensaun/hapa/edit/{id}', [HapaController::class, 'edit'])->name('edithapa');
Route::post('/updatedatahapa/{id}', [HapaController::class, 'updatedatahapa'])->name('updatedatahapa');
Route::get('deletehapa/{id}', [HapaController::class, 'delete'])->name('deletehapa');
Route::get('/export-hapa', [HapaController::class, 'exportpdf'])->name('export-hapa');

//Incubator
Route::get('/manutensaun/incubator/index', [IncubatorController::class, 'indexincub'])->name('indexincub')->middleware('auth');
Route::get('/manutensaun/incubator/aumentadata', [IncubatorController::class, 'create'])->name('aumentadataincub');
Route::post('/insertdataincub', [IncubatorController::class, 'store'])->name('insertdataincub');
Route::get('/manutensaun/incubator/edit/{id}', [IncubatorController::class, 'edit'])->name('editincub');
Route::post('/updatedataincub/{id}', [IncubatorController::class, 'updatedataincub'])->name('updatedataincub');
Route::get('delcub/{id}', [IncubatorController::class, 'delete'])->name('delcub');
Route::get('/export-incubator', [IncubatorController::class, 'exportpdf'])->name('export-incubator');

//Troka Bee Kolam (sdk)
Route::get('/manutensaun/troka_bee/kolam/index', [TbkolamController::class, 'indextbkolam'])->name('indextbkolam')->middleware('auth');
Route::get('/manutensaun/troka_bee/kolam/aumentadata', [TbkolamController::class, 'create'])->name('aumentadatatbkolam');
Route::post('/insertdatatbkolam', [TbkolamController::class, 'store'])->name('insertdatatbkolam');
Route::get('/manutensaun/troka_bee/kolam/edit/{id}', [TbkolamController::class, 'edit'])->name('edittbkolam');
Route::post('/updatedatatbkolam/{id}', [TbkolamController::class, 'updatedatatbkolam'])->name('updatedatatbkolam');
Route::get('deltbkol/{id}', [TbkolamController::class, 'delete'])->name('deltbkol');
Route::get('/export-troka-bee-kolam', [TbkolamController::class, 'exportpdf'])->name('export-troka-bee-kolam');

//Informasaun
//religion
Route::get('/datareligion', [ReligionController::class, 'index'])->name('datareligion')->middleware('auth');
Route::get('/tambahagama', [ReligionController::class, 'create'])->name('tambahagama');
Route::post('/insertdatareligion', [ReligionController::class, 'store'])->name('insertdatareligion');
Route::get('/editreligion/{id}', [ReligionController::class, 'edit'])->name('editreligion');
Route::post('/updatereligion/{id}', [ReligionController::class, 'update'])->name('updatereligion');
Route::get('/delrel/{id}', [ReligionController::class, 'delete'])->name('delrel');
Route::get('/export-relijiaun', [ReligionController::class, 'exportpdf'])->name('export-relijiaun');

//Nivel Edukasaun
Route::get('/data_extra/niv_ed/index', [NiveleducasaunController::class, 'index'])->name('index')->middleware('auth');
Route::get('/data_extra/niv_ed/aumentanivel', [NiveleducasaunController::class, 'create'])->name('aumentanivel');
Route::post('/insertdatanivel', [NiveleducasaunController::class, 'store'])->name('insertdatanivel');
Route::get('/data_extra/niv_ed/edit/{id}', [NiveleducasaunController::class, 'edit'])->name('edit');
Route::post('/updatedataniv/{id}', [NiveleducasaunController::class, 'updatedataniv'])->name('updatedataniv');
Route::get('del/{id}', [NiveleducasaunController::class, 'delete'])->name('del');
Route::get('/export-nivel-edukasaun', [NiveleducasaunController::class, 'exportpdf'])->name('export-nivel-edukasaun');

//Aldeia
Route::get('/data_extra/aldeia/index', [AldeiaController::class, 'indexaldeia'])->name('indexaldeia')->middleware('auth');
Route::get('/data_extra/aldeia/aumentaaldeia', [AldeiaController::class, 'create'])->name('aumentaaldeia');
Route::post('/getPosto1', [AldeiaController::class, 'getPosto'])->name('getPosto1');
Route::post('/getSuco1', [AldeiaController::class, 'getSuco'])->name('getSuco1');
Route::post('/insertdataaldeia', [AldeiaController::class, 'store'])->name('insertdataaldeia');
// Route::get('/data_extra/aldeia/edit/{id}', [AldeiaController::class, 'edit'])->name('edit');
// Route::post('/updatedataniv/{id}', [AldeiaController::class, 'updatedataniv'])->name('updatedataniv');
Route::get('delaldeia/{id}', [AldeiaController::class, 'delete'])->name('delaldeia');
Route::get('/exportpdf-ald', [AldeiaController::class, 'exportpdf'])->name('exportpdf-ald');

//Suco
Route::get('/suco', [SucoController::class, 'indexsuco'])->name('suco')->middleware('auth');
Route::get('/data_extra/suco/aumentasuco', [SucoController::class, 'create'])->name('aumentasuco');
Route::post('/getPosto2', [SucoController::class, 'getPosto'])->name('getPosto2');
Route::post('/insertdatasuco', [SucoController::class, 'store'])->name('insertdatasuco');
 Route::get('/data_extra/suco/edit/{id}', [SucoController::class, 'edit'])->name('edit-suco');
 Route::post('/update-suco/{id}', [SucoController::class, 'updatedataniv'])->name('update-suco');
Route::get('del-suco/{id}', [SucoController::class, 'delete'])->name('del-suco');
Route::get('/export-suco', [SucoController::class, 'exportpdf'])->name('export-suco');

//Posto
Route::get('/posto', [PostoController::class, 'indexposto'])->name('posto')->middleware('auth');
Route::get('/data_extra/posto/aumentaposto', [PostoController::class, 'create'])->name('aumentaposto');
Route::post('/insertdataposto', [PostoController::class, 'store'])->name('insertdataposto');
// Route::get('/data_extra/posto/edit/{id}', [PostoController::class, 'edit'])->name('edit');
// Route::post('/updatedataniv/{id}', [PostoController::class, 'updatedataniv'])->name('updatedataniv');
Route::get('del-posto/{id}', [PostoController::class, 'delete'])->name('delposto');
Route::get('/export-posto', [PostoController::class, 'exportpdf'])->name('export-posto');

//Municipio
Route::get('/municipio', [MunicipioController::class, 'indexmun'])->name('municipio')->middleware('auth');
Route::get('/data_extra/municipio/aumentamun', [MunicipioController::class, 'create'])->name('aumentamun');
Route::post('/insertdatamun', [MunicipioController::class, 'store'])->name('insertdatamun');
Route::get('/municipio/edit/{id}', [MunicipioController::class, 'edit'])->name('editmun');
Route::post('/updatedatamun/{id}', [MunicipioController::class, 'update'])->name('updatedatamun');
Route::get('delmun/{id}', [MunicipioController::class, 'delete']);
Route::get('/export-municipio', [MunicipioController::class, 'exportpdf'])->name('export-municipio');

// Rekursu
// Kualidade Bee
Route::get('/rekursu/bee/index', [KualidadebeeController::class, 'index'])->name('bee')->middleware('auth');
Route::get('/rekursu/bee/aumentadata', [KualidadebeeController::class, 'create'])->name('aumentadatabee');
Route::post('/insertdatabee', [KualidadebeeController::class, 'store'])->name('insertdatabee');
Route::get('/rekursu/bee/edit/{id}', [KualidadebeeController::class, 'edit'])->name('editbee');
Route::post('/updatedatabee/{id}', [KualidadebeeController::class, 'update'])->name('updatedatabee');
Route::get('delbee/{id}', [KualidadebeeController::class, 'delete'])->name('delbee');
Route::get('/export-kualidade-bee', [KualidadebeeController::class, 'exportpdf'])->name('export-kualidade-bee');

// Eletrisidade
Route::get('/eletrisidade/index', [EletrisidadeController::class, 'index'])->name('eletrisidade')->middleware('auth');
Route::get('/eletrisidade/aumentadata', [EletrisidadeController::class, 'create']);
Route::post('/inserteletrisidade', [EletrisidadeController::class, 'store'])->name('inserteletrisidade');
Route::get('/eletrisidade/edit/{id}', [EletrisidadeController::class, 'edit']);
Route::post('/updateeletrisidade/{id}', [EletrisidadeController::class, 'update'])->name('updateeletrisidade');
Route::get('deleletrisidade/{id}', [EletrisidadeController::class, 'delete'])->name('deleletrisidade');
Route::get('/export-eletrisidade', [EletrisidadeController::class, 'exportpdf'])->name('export-eletrisidade');

// Hahan Ikan
Route::get('/rekursu/hahan_ikan/index', [HahanikanController::class, 'index'])->name('indexhahan')->middleware('auth');
Route::get('/rekursu/hahan_ikan/aumentadata', [HahanikanController::class, 'create'])->name('aumentadatahahan');
Route::post('/inserthahan', [HahanikanController::class, 'store'])->name('inserthahan');
Route::get('/rekursu/hahan_ikan/edit/{id}', [HahanikanController::class, 'edit'])->name('edithahan');
Route::post('/updatedatahahan/{id}', [HahanikanController::class, 'update'])->name('updatedatahahan');
Route::get('delhahan/{id}', [HahanikanController::class, 'delete'])->name('delhahan');
Route::get('/export-ingrediente', [HahanikanController::class, 'exportpdf'])->name('export-ingrediente');

// Fo Hahan Ikan
Route::get('/fo-han', [FohanikanController::class, 'index'])->name('fo-han')->middleware('auth');
Route::get('/aumentafohan', [FohanikanController::class, 'create'])->name('aumentafohan');
Route::post('/insertfohan', [FohanikanController::class, 'store'])->name('insertfohan');
Route::get('/editfohan{id}', [FohanikanController::class, 'edit'])->name('editfohan');
Route::post('/updatefohan', [FohanikanController::class, 'update'])->name('updatefohan');
Route::get('delfohan/{id}', [FohanikanController::class, 'delete'])->name('delfohan');
Route::get('/export-atividade-fo-han-ikan', [FohanikanController::class, 'exportpdf'])->name('export-atividade-fo-han-ikan');

// Fertilizante
Route::get('/fertilizante', [FertilizanteController::class, 'index'])->name('fertilizante')->middleware('auth');
Route::get('/aumentafertilizante', [FertilizanteController::class, 'create'])->name('aumentafertilizante');
Route::post('/insertfertilizante', [FertilizanteController::class, 'store'])->name('insertfertilizante');
Route::get('/editfertilizante/{id}', [FertilizanteController::class, 'edit'])->name('editfertilizante');
Route::post('/updatefertilizante', [FertilizanteController::class, 'update'])->name('updatefertilizante');
Route::get('delfertilizante/{id}', [FertilizanteController::class, 'delete'])->name('delfertilizante');
Route::get('/export-fertilizante', [FertilizanteController::class, 'exportpdf'])->name('export-fertilizante');

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
