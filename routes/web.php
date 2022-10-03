<?php

use App\Http\Controllers\AldeiaController;
use App\Http\Controllers\BeeController;
use App\Http\Controllers\DistribuisaunController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EstruturaController;
use App\Http\Controllers\HahanikanController;
use App\Http\Controllers\HapaController;
use App\Http\Controllers\IkanController;
use App\Http\Controllers\IkantolunController;
use App\Http\Controllers\IkanoanController;
use App\Http\Controllers\IkansrtController;
use App\Http\Controllers\IncubatorController;
use App\Http\Controllers\KlienteController;
use App\Http\Controllers\KlientegrupoController;
use App\Http\Controllers\KolamController;
use App\Http\Controllers\LelaunController;
use App\Http\Controllers\TipuikanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\NiveleducasaunController;
use App\Http\Controllers\OrijemikanController;
use App\Http\Controllers\PostoController;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\SucoController;
use App\Http\Controllers\TbknurseryController;
use App\Http\Controllers\TbkolamController;
use App\Models\Employee;
use App\Http\Controllers\TestingHelperController;
use App\Models\Distribuisaun;

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

Route::get('/', function () {
    $jumlahpegawai = Employee::count();
    $jumlahpegawaicowo = Employee::where('jeneru', 'M')->count();
    $jumlahpegawaicewe = Employee::where('jeneru', 'F')->count();


    //dashboard
    return view('welcome', compact('jumlahpegawai', 'jumlahpegawaicowo', 'jumlahpegawaicewe'));
})->middleware('auth');


//pegawai
Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai')->middleware('auth');
Route::get('/tambahpegawai', [EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai');
Route::post('/insertdata', [EmployeeController::class, 'insertdata'])->name('insertdata');
Route::get('/tampilkandata/{id}', [EmployeeController::class, 'tampilkandata'])->name('tampilkandata');
Route::put('/updatedataemp/{id}', [EmployeeController::class, 'updatedataemp'])->name('updatedataemp');
Route::get('/delete1/{id}', [EmployeeController::class, 'delete'])->name('delete1');
// Estrutura
Route::get('/estrutura', [EmployeeController::class, 'indexest'])->name('estrutura')->middleware('auth');

//export PDF
Route::get('/exportpdf', [EmployeeController::class, 'exportpdf'])->name('exportpdf');

//export PDF
Route::get('/exportexcel', [EmployeeController::class, 'exportexcel'])->name('exportexcel');
Route::post('/importexcel', [EmployeeController::class, 'importexcel'])->name('importexcel');

//Login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');

//registration
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');

//logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


//ikan
Route::get('/data_ikan/index', [IkanController::class, 'index'])->name('ikan')->middleware('auth');
Route::get('/data_ikan/aumentadata', [IkanController::class, 'create'])->name('aumentadataikan');
Route::post('/insertdataikan', [IkanController::class, 'store'])->name('insertdataikan');
Route::get('/data_ikan/edit/{id}', [IkanController::class, 'edit'])->name('editikan');
Route::post('/updatedataikan/{id}', [IkanController::class, 'update'])->name('updatedataikan');
Route::get('/deleteikan/{id}', [IkanController::class, 'delete'])->name('deleteikan');

//ikan Tolun
Route::get('/ikanTolun/index', [IkantolunController::class, 'index'])->name('ikan_tolun')->middleware('auth');
Route::get('/ikanTolun/aumentadata', [IkantolunController::class, 'create'])->name('aumentadataikantolun');
Route::post('/insertdataikantolun', [IkantolunController::class, 'store'])->name('insertdataikantolun');
Route::get('/ikanTolun/edit/{id}', [IkantolunController::class, 'edit'])->name('editikantolun');
Route::post('/updatedataikantolun/{id}', [IkantolunController::class, 'update'])->name('updatedataikantolun');
Route::get('/deleteikantolun/{id}', [IkantolunController::class, 'delete'])->name('deleteikantolun');

//ikan Srt
Route::get('/data_ikan_srt/index', [IkansrtController::class, 'index'])->name('ikansrt')->middleware('auth');
Route::get('/data_ikan_srt/aumentadata', [IkansrtController::class, 'create'])->name('aumentaisrt');
Route::post('/insertdataisrt', [IkansrtController::class, 'store'])->name('insertdataisrt');
Route::get('/data_ikan_srt/edit/{id}', [IkansrtController::class, 'edit'])->name('editisrt');
Route::post('/updatedataisrt/{id}', [IkansrtController::class, 'update'])->name('updatedataisrt');
Route::get('/deleteisrt/{id}', [IkansrtController::class, 'delete'])->name('deleteisrt');

//ikan Oan
Route::get('/data_ikan_oan/index', [IkanoanController::class, 'index'])->name('ikanoan')->middleware('auth');
Route::get('/data_ikan_oan/aumentadata', [IkanoanController::class, 'create'])->name('aumentaioan');
Route::post('/insertdataioan', [IkanoanController::class, 'store'])->name('insertdataioan');
Route::get('/data_ikan_oan/edit/{id}', [IkanoanController::class, 'edit'])->name('editioan');
Route::post('/updatedataioan/{id}', [IkanoanController::class, 'update'])->name('updatedataioan');
Route::get('/deleteioan/{id}', [IkanoanController::class, 'delete'])->name('deleteioan');

//Helper Employee Id Generate
Route::get('test',[TestingHelperController::class, 'index']);

//Tipu Ikan
Route::get('/data_extra/tipu_ikan/index', [TipuikanController::class, 'indextipu'])->name('indextipu')->middleware('auth');
Route::get('/data_extra/tipu_ikan/aumentadata', [TipuikanController::class, 'create'])->name('aumentatipu');
Route::post('/insertdatatipu', [TipuikanController::class, 'store'])->name('insertdatatipu');
Route::get('/data_ikan_tolun/edit/{id}', [TipuikanController::class, 'tampilkandata'])->name('edittipu');
Route::post('/updatedatatipu/{id}', [TipuikanController::class, 'updatedata'])->name('updatedatatipu');
Route::get('/delete/{id}', [TipuikanController::class, 'delete'])->name('delete');

//Orijem Ikan
Route::get('/data_extra/orijem/index', [OrijemikanController::class, 'indexori'])->name('indexori')->middleware('auth');
Route::get('/data_extra/orijem/aumentadata', [OrijemikanController::class, 'create'])->name('aumentaori');
Route::post('/insertdataori', [OrijemikanController::class, 'store'])->name('insertdataori');
Route::get('/data_ikan_tolun/edit/{id}', [OrijemikanController::class, 'edit'])->name('editori');
Route::post('/updatedataori/{id}', [OrijemikanController::class, 'update'])->name('updatedataori');
Route::get('/delete/{id}', [OrijemikanController::class, 'delete'])->name('delete');

//Kliente Individual
Route::get('/klientes/individual/index', [KlienteController::class, 'indexind'])->name('indexind')->middleware('auth');
Route::get('/klientes/individual/aumentadataindividual', [KlienteController::class, 'create'])->name('aumentaindividual');
Route::post('/insertdataind', [KlienteController::class, 'store'])->name('insertdataind');
Route::get('/klientes/individual/edit/{id}', [KlienteController::class, 'edit'])->name('editind');
Route::put('/updatedataind/{id}', [KlienteController::class, 'update'])->name('updatedataind');
Route::get('/deleteind/{id}', [KlienteController::class, 'delete'])->name('deleteind');

//Kliente Grupo
Route::get('/klientes/grupo/index', [KlientegrupoController::class, 'indexgp'])->name('indexgp')->middleware('auth');
Route::get('/klientes/grupo/aumentadata', [KlientegrupoController::class, 'create'])->name('aumentagp');
Route::post('/insertdatagp', [KlientegrupoController::class, 'store'])->name('insertdatagp');
Route::get('/klientes/grupo/edit/{id}', [KlientegrupoController::class, 'editgp'])->name('editgp');
Route::put('/updategp/{id}', [KlientegrupoController::class, 'updategp'])->name('updategp');
Route::get('/deletegp/{id}', [KlientegrupoController::class, 'delete'])->name('deletegp');

//Operasaun Distribuisaun
Route::get('/operasaun/distribuisaun/index', [DistribuisaunController::class, 'index'])->name('indexdist')->middleware('auth');
Route::get('/operasaun/distribuisaun/aumentadata', [DistribuisaunController::class, 'create'])->name('aumentadist');
Route::post('/insertdatadist', [DistribuisaunController::class, 'store'])->name('insertdatadist');
Route::get('/operasaun/distribuisaun/edit/{id}', [DistribuisaunController::class, 'edit'])->name('editdist');
Route::post('/updatedatadist/{id}', [DistribuisaunController::class, 'update'])->name('updatedatadist');
Route::get('/deletedist/{id}', [DistribuisaunController::class, 'delete'])->name('deletedist');

//Operasaun Lelaun
Route::get('/operasaun/lelaun/index', [LelaunController::class, 'index'])->name('indexlel')->middleware('auth');
Route::get('/operasaun/lelaun/aumentadata', [LelaunController::class, 'create'])->name('aumentalel');
Route::post('/insertdatalel', [LelaunController::class, 'store'])->name('insertdatalel');
Route::get('/operasaun/lelaun/edit/{id}', [LelaunController::class, 'edit'])->name('editlel');
Route::post('/updatedatalel/{id}', [LelaunController::class, 'update'])->name('updatedatalel');
Route::get('/deletelel/{id}', [LelaunController::class, 'delete'])->name('deletelel');

//Manutensaun
//Kolam
Route::get('/manutensaun/kolam/index', [KolamController::class, 'indexkolam'])->name('indexkolam')->middleware('auth');
Route::get('/manutensaun/kolam/aumentadata', [KolamController::class, 'create'])->name('aumentadatakolam');
Route::post('/insertdatakolam', [KolamController::class, 'store'])->name('insertdatakolam');
Route::get('/manutensaun/kolam/edit/{id}', [KolamController::class, 'editkolam'])->name('editkolam');
Route::post('/updatedatakolam/{id}', [KolamController::class, 'updatedatakolam'])->name('updatedatakolam');
Route::get('deletekol/{id}', [KolamController::class, 'delete'])->name('deletekol');

//Hapa
Route::get('/manutensaun/hapa/index', [HapaController::class, 'indexhapa'])->name('indexhapa')->middleware('auth');
Route::get('/manutensaun/hapa/aumentadata', [HapaController::class, 'create'])->name('aumentadatahapa');
Route::post('/insertdatahapa', [HapaController::class, 'store'])->name('insertdatahapa');
Route::get('/manutensaun/hapa/edit/{id}', [HapaController::class, 'edit'])->name('edithapa');
Route::post('/updatedatahapa/{id}', [HapaController::class, 'updatedatahapa'])->name('updatedatahapa');
Route::get('deletehapa/{id}', [HapaController::class, 'delete'])->name('deletehapa');

//Incubator
Route::get('/manutensaun/incubator/index', [IncubatorController::class, 'indexincub'])->name('indexincub')->middleware('auth');
Route::get('/manutensaun/incubator/aumentadata', [IncubatorController::class, 'create'])->name('aumentadataincub');
Route::post('/insertdataincub', [IncubatorController::class, 'store'])->name('insertdataincub');
Route::get('/manutensaun/incubator/edit/{id}', [IncubatorController::class, 'edit'])->name('editincub');
Route::post('/updatedataincub/{id}', [IncubatorController::class, 'updatedataincub'])->name('updatedataincub');
Route::get('delcub/{id}', [IncubatorController::class, 'delete'])->name('delcub');

//Troka Bee Kolam
Route::get('/manutensaun/troka_bee/kolam/index', [TbkolamController::class, 'indextbkolam'])->name('indextbkolam')->middleware('auth');
Route::get('/manutensaun/troka_bee/kolam/aumentadata', [TbkolamController::class, 'create'])->name('aumentadatatbkolam');
Route::post('/insertdatatbkolam', [TbkolamController::class, 'store'])->name('insertdatatbkolam');
Route::get('/manutensaun/troka_bee/kolam/edit/{id}', [TbkolamController::class, 'edit'])->name('edittbkolam');
Route::post('/updatedatatbkolam/{id}', [TbkolamController::class, 'updatedatatbkolam'])->name('updatedatatbkolam');
Route::get('deltbkol/{id}', [TbkolamController::class, 'delete'])->name('deltbkol');

//Informasaun
//religion
Route::get('/datareligion', [ReligionController::class, 'index'])->name('datareligion')->middleware('auth');
Route::get('/tambahagama', [ReligionController::class, 'create'])->name('tambahagama');
Route::post('/insertdatareligion', [ReligionController::class, 'store'])->name('insertdatareligion');

//Nivel Edukasaun
Route::get('/data_extra/niv_ed/index', [NiveleducasaunController::class, 'index'])->name('index')->middleware('auth');
Route::get('/data_extra/niv_ed/aumentanivel', [NiveleducasaunController::class, 'create'])->name('aumentanivel');
Route::post('/insertdatanivel', [NiveleducasaunController::class, 'store'])->name('insertdatanivel');
Route::get('/data_extra/niv_ed/edit/{id}', [NiveleducasaunController::class, 'edit'])->name('edit');
Route::post('/updatedataniv/{id}', [NiveleducasaunController::class, 'updatedataniv'])->name('updatedataniv');
Route::get('del/{id}', [NiveleducasaunController::class, 'delete'])->name('del');

//Aldeia
Route::get('/data_extra/aldeia/index', [AldeiaController::class, 'indexaldeia'])->name('indexaldeia')->middleware('auth');
Route::get('/data_extra/aldeia/aumentaaldeia', [AldeiaController::class, 'create'])->name('aumentaaldeia');
Route::post('/insertdataaldeia', [AldeiaController::class, 'store'])->name('insertdataaldeia');
// Route::get('/data_extra/aldeia/edit/{id}', [AldeiaController::class, 'edit'])->name('edit');
// Route::post('/updatedataniv/{id}', [AldeiaController::class, 'updatedataniv'])->name('updatedataniv');
// Route::get('del/{id}', [AldeiaController::class, 'delete'])->name('del');

//Suco
Route::get('/data_extra/suco/index', [SucoController::class, 'indexsuco'])->name('indexsuco')->middleware('auth');
Route::get('/data_extra/suco/aumentasuco', [SucoController::class, 'create'])->name('aumentasuco');
Route::post('/insertdatasuco', [SucoController::class, 'store'])->name('insertdatasuco');
// Route::get('/data_extra/suco/edit/{id}', [SucoController::class, 'edit'])->name('edit');
// Route::post('/updatedataniv/{id}', [SucoController::class, 'updatedataniv'])->name('updatedataniv');
// Route::get('del/{id}', [SucoController::class, 'delete'])->name('del');

//Posto
Route::get('/data_extra/posto/index', [PostoController::class, 'indexposto'])->name('indexposto')->middleware('auth');
Route::get('/data_extra/posto/aumentaposto', [PostoController::class, 'create'])->name('aumentaposto');
Route::post('/insertdataposto', [PostoController::class, 'store'])->name('insertdataposto');
// Route::get('/data_extra/posto/edit/{id}', [PostoController::class, 'edit'])->name('edit');
// Route::post('/updatedataniv/{id}', [PostoController::class, 'updatedataniv'])->name('updatedataniv');
// Route::get('del/{id}', [PostoController::class, 'delete'])->name('del');

//Municipio
Route::get('/data_extra/municipio/index', [MunicipioController::class, 'indexmun'])->name('indexmun')->middleware('auth');
Route::get('/data_extra/municipio/aumentamun', [MunicipioController::class, 'create'])->name('aumentamun');
Route::post('/insertdatamun', [MunicipioController::class, 'store'])->name('insertdatamun');
// Route::get('/data_extra/municipio/edit/{id}', [MunicipioController::class, 'edit'])->name('edit');
// Route::post('/updatedataniv/{id}', [MunicipioController::class, 'updatedataniv'])->name('updatedataniv');
// Route::get('del/{id}', [MunicipioController::class, 'delete'])->name('del');

// Rekursu
// Bee
Route::get('/rekursu/bee/index', [BeeController::class, 'index'])->name('indexbee')->middleware('auth');
Route::get('/rekursu/bee/aumentadata', [BeeController::class, 'create'])->name('aumentadatabee');
Route::post('/insertdatabee', [BeeController::class, 'store'])->name('insertdatabee');
Route::get('/rekursu/bee/edit/{id}', [BeeController::class, 'edit'])->name('editbee');
Route::post('/updatedatabee/{id}', [BeeController::class, 'update'])->name('updatedatabee');
Route::get('delbee/{id}', [BeeController::class, 'delete'])->name('delbee');

// Hahan Ikan
Route::get('/rekursu/hahan_ikan/index', [HahanikanController::class, 'index'])->name('indexhahan')->middleware('auth');
Route::get('/rekursu/hahan_ikan/aumentadata', [HahanikanController::class, 'create'])->name('aumentadatahahan');
Route::post('/inserthahan', [HahanikanController::class, 'store'])->name('inserthahan');
Route::get('/rekursu/hahan_ikan/edit/{id}', [HahanikanController::class, 'edit'])->name('edithahan');
Route::post('/updatedatahahan/{id}', [HahanikanController::class, 'update'])->name('updatedatahahan');
Route::get('delhahan/{id}', [HahanikanController::class, 'delete'])->name('delhahan');