<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MiControlador;
use App\Models\Articulo;


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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/',[MiControlador::class,'index']);
Route::get('/crear',[MiControlador::class,'create']);
Route::get('/articulos',[MiControlador::class,'store']);
Route::get('/contacto',[MiControlador::class,'contactar']);
Route::get('/galeria',[MiControlador::class,'galeria']);

  
/*
Route::get('/insertar', function () {

        DB::insert("INSERT INTO articulos (nombre_articulo,precio,pais_origen,seccion,observaciones) VALUES (?,?,?,?,?)",["Jarron" , 152 ,"Japon","Ceramica","ganga"]);
    });

    Route::get('/leer', function () {

    $resultados = DB::select('select * from articulos where id = ?', [2]);
    foreach ($resultados as $resultado) {
        return $resultado->nombre_articulo;
    }
    });

    Route::get('/actualizar', function () {

        DB::update("UPDATE articulos SET seccion = 'Decoracion'WHERE ID=?",[2]);
    });

    Route::get('/borrar', function () {

        DB::update("DELETE FROM articulos WHERE ID=?",[2]);
    });
*/

Route::get('/leer', function(){

    /*
    $articulos = Articulo::all();

    foreach($articulos as $articulo){
        echo " Nombre: $articulo->nombre_articulo precio: $articulo->precio  <br>";
    }

    */

    $articulos = Articulo::where('seccion','ceramica')->orderBy("nombre_articulo")->get();
    $articulos = Articulo::where('seccion','ceramica')->max("precio");
    return $articulos;

});

Route::get('/insertar', function(){

    
    $articulos = New Articulo;
    $articulos->nombre_articulo = "pantalones";
    $articulos->precio = 60;
    $articulos->pais_origen = "españa";
    $articulos->observaciones = "lavadoa piedras";
    $articulos->seccion = "confeccion";
    $articulos->nombre_articulo = "Reloj";
    $articulos->precio = 30;
    $articulos->pais_origen = "italia";
    $articulos->observaciones = "oro";
    $articulos->seccion = "joyeria";
    $articulos->save();

});

Route::get('/actualizar', function(){

   /* 
    $articulos = Articulo::find(6);
    $articulos->nombre_articulo = "pantalones";
    $articulos->precio = 90;
    $articulos->pais_origen = "españa";
    $articulos->observaciones = "lavadoa piedras";
    $articulos->seccion = "confeccion";
    $articulos->save();

    */

    //Articulo::where("seccion","Ceramica")->update(["seccion" => "Menaje"]);
    Articulo::where("seccion","joyeria")->where("pais_origen","italia")->update(["precio" => 90]);


});