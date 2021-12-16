<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
USE App\Models\Document;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('drivers.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $documento  = Document::find($id);
        $drivers    = Driver::where('document_id',$documento->id); 
        if($documento->count() > 0){
            return view('drivers.editar',['documento'=> $documento,'drivers'=> $drivers]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        
        $validator = Validator::make($request->all(),[
            'name'              => 'required|max:250',
            'so_xp'             => "max:30000",
            'so_diez'           => "max:30000",
        ]);

        if ($validator->fails()) {
            return redirect('editard/' . $id . '/editard')->withErrors($validator)
            ->withInput();
        }

        $filePathxp = null;
        $filePathdiez = null;
        if($request->hasFile('so_xp')){

            //Eliminamos el archivo de storage
            $filePathxp = substr(Crypt::encryptString($request->file('so_xp')->getClientOriginalName()), 0, 5) .
            $request->file('so_xp')->getClientOriginalName();
            

            Storage::disk('pdfs')->put(
                $filePathxp,
                $request->file('so_xp')->getContent()
            );
        }

        if($request->hasFile('so_diez')){

            //Eliminamos el archivo de storage
            $filePathdiez = substr(Crypt::encryptString($request->file('so_diez')->getClientOriginalName()), 0, 5) .
            $request->file('so_diez')->getClientOriginalName();
            

            Storage::disk('pdfs')->put(
                $filePathdiez,
                $request->file('so_diez')->getContent()
            );
        }

        try {

            Driver::insert(
                [
                    'name'          => $request->input('name'),
                    'document_id'   => $id,
                    'so_xp'         => $filePathxp,
                    'so_diez'       => $filePathdiez
                ]
            );
            return redirect('editard/' . $id . '/editard')->with('success','Drvier Generado con Exíto');
        } catch (\Throwable $th) {
            return back()->with('error','Error al guardar el Driver');
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $drive      = Driver::find($id);
        $driverXP     = $drive->so_xp;
        $driverDIEZ   = $drive->so_diez;

        //Obtenemos Driver name
        try {
            
            //Recorremos y eliminamos archivos en Storage
            Storage::disk('pdfs')->delete($driverXP);
            Storage::disk('pdfs')->delete($driverDIEZ);
            
            //Eliminamos registros de tabla
            Driver::destroy($id);
            return back()->with('success','Driver Eliminado con Exíto');
        } catch (\Throwable $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
