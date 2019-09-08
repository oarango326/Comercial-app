<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ClientesImport;
use Maatwebsite\Excel\Facades\Excel;

class configController extends Controller
{
	/*function __construct()
    {
        $this->middleware('auth');
    }
	*/
    public function index(){
    	return view('mantenimiento.index');
    }

     public function Clientesimport() 
    {
    	try{
	        Excel::import(new ClientesImport,request()->file('file'));   
	        return redirect()
		    	->route('configuraciones')
		    	->with('info','Se realizo importacion Correctamente');
    	}catch(\ErrorException $e)
    	{
    		return redirect()
		    	->route('configuraciones')
		    	->with('error','Ha ocurrido un error: '.$e->getmessage());
    	}catch(\PDOException $e)
    	{
    		return redirect()
		    	->route('configuraciones')
		    	->with('error','Ha ocurrido un error: '.$e->getmessage());
    	}

    }

//funcion para importar archivos desde CSV con libreria Mysqli
	public function cargaClienteCSV()
	{
		//return $request->all();
		$connect = mysqli_connect("localhost", "root", "", "comercialapp");
	    
	    if(isset($_POST["submit"]))
	    {
	      if($_FILES['file']['name'])
	      {
	        $filename = explode(".", $_FILES['file']['name']);
	        //var_dump($filename);
	        if($filename[1] == 'csv')
	        {
	          $handle = fopen($_FILES['file']['tmp_name'], "r");
	          while($data = fgetcsv($handle))
	          {
	            $item1 = mysqli_real_escape_string($connect, $data[0]);
	            $item2 = mysqli_real_escape_string($connect, $data[1]);
	            $item3 = mysqli_real_escape_string($connect, $data[2]);
	            $item4 = mysqli_real_escape_string($connect, $data[3]);
	            $item5 = mysqli_real_escape_string($connect, $data[4]);
	            $item6 = mysqli_real_escape_string($connect, $data[5]);
	            $item7 = mysqli_real_escape_string($connect, $data[6]);


	            $query = "INSERT into clientes(nombre,cif,direccion,ciudad,estado,cp,telefono)
	              values('$item1','$item2','$item3','$item4','$item5','$item6','$item7')";

	            mysqli_query($connect, $query);
				//pg_query($connect, $query);	          
	          }
	          fclose($handle);;
            }
            else
            {
                return redirect()
                ->route('configuraciones')
                ->with('infowarning','Este Archivo no posee extencion .csv');
            }
	      }
	    }
	    return redirect()
	    	->route('configuraciones')
	    	->with('info','Se realizo importacion Correctamente');
	}
}

