<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Driver;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentos = Document::all();
        return view('documents.index',['documentos'=>$documentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.nuevo',['documento' => new Document()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $documento = request()->except('_token');
        
        // single var check
        /*$messages = [
            'descripcion'       => 'La :attribute es requerida.',
            'version'           => 'La :attribute es requerida.',
            'sede'              => 'La :attribute es requerida',
            'autor'             => 'El :attribute es requerido',
            'fecha_elaboracion' => 'La :attribute es requerida',
            'documento'              => 'El :attribute es requerido',
        ];*/
        
        $validator = Validator::make($request->all(),[
            'descripcion'       => 'required|max:250',
            'version'           => 'required|max:250',
            'sede'              => 'required|max:250',
            'area'              => 'required|max:50',
            'autor'             => 'required|max:50',
            'fecha_elaboracion' => 'required|date_format:Y-m-d',
            'documento'         => "required|mimetypes:application/pdf|max:30000",
            'title_driver'      => 'required|max:70',
        ]);

        if ($validator->fails()) {
            return redirect()->route('create')
            ->withErrors($validator)
            ->withInput();
        }
        //Guardar Documentos and show edit
        $imagePath = null;
        if($request->hasFile('documento')){
            $imagePath = substr(Crypt::encryptString($request->file('documento')->getClientOriginalName()), 0, 5) .
            $request->file('documento')->getClientOriginalName();
            

            Storage::disk('pdfs')->put(
                $imagePath,
                $request->file('documento')->getContent()
            );

            Document::insert(
                [
                    'descripcion'       => $request->input('descripcion'),
                    'version'           => $request->input('version'),
                    'sede'              => $request->input('sede'),
                    'area'              => $request->input('area'),
                    'autor'             => $request->input('autor'),
                    'fecha_elaboracion' => $request->input('fecha_elaboracion'),
                    'documento'         => $imagePath,
                    'title_driver'      => $request->input('title_driver')
                ]
            );

            return redirect('document')->with('success','Documento Generado con Exíto');
        }else{
            return redirect()->route('create')
            ->withErrors($validator)
            ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {   //var_dump($document->listDivers->toArray());
        return view('documents.formulario',['documento'=>$document]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $documento = Document::find($id);
        if($documento->count() > 0){
            return view('documents.editar',['documento'=> $documento]);
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
        //Post
        $documento = request()->except('_token');
        //Data
        $docu      = Document::find($id);

        $validator = Validator::make($request->all(),[
            'descripcion'       => 'required|max:250',
            'version'           => 'required|max:250',
            'sede'              => 'required|max:250',
            'area'              => 'required|max:50',
            'autor'             => 'required|max:50',
            'fecha_elaboracion' => 'required|date_format:Y-m-d',
            //'documento'         => "required|mimetypes:application/pdf|max:30000",
            'title_driver'      => 'required|max:70',
        ]);

        if ($validator->fails()) {
            return redirect('editar/' . $id . '/editar')->withErrors($validator)
            ->withInput();
        }

        $imagePath = null;
        if($request->hasFile('documento')){

            //Eliminamos el archivo de storage
            $nameDoc = $docu->documento;
            Storage::disk('pdfs')->delete($nameDoc);

            $imagePath = substr(Crypt::encryptString($request->file('documento')->getClientOriginalName()), 0, 5) .
            $request->file('documento')->getClientOriginalName();
            

            Storage::disk('pdfs')->put(
                $imagePath,
                $request->file('documento')->getContent()
            );
        }

        Document::where(['id' => $docu->id])->update(
            [
                'descripcion'       => $request->input('descripcion'),
                'version'           => $request->input('version'),
                'sede'              => $request->input('sede'),
                'area'              => $request->input('area'),
                'autor'             => $request->input('autor'),
                'fecha_elaboracion' => $request->input('fecha_elaboracion'),
                'documento'         => $imagePath ?? $docu->documento,
                'title_driver'     => $request->input('title_driver')
            ]
        );

        return redirect('document');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $docu      = Document::find($id);
        $nameDoc = $docu->documento;

        //Obtenemos Driver name
        try {
            $drivers = Driver::where('document_id', $id)->get();
            //Recorremos y eliminamos archivos en Storage
            foreach ($drivers as $driver){
                Storage::disk('pdfs')->delete($driver->so_xp);
                Storage::disk('pdfs')->delete($driver->so_diez);
            }
            //Eliminamos registros de tabla
            Driver::where('document_id',$id)->delete();
            //luego Eliminamos la base principal que es el documento
            Storage::disk('pdfs')->delete($nameDoc);
            Document::destroy($id);
            return redirect('document')->with('success','Documento Generado con Exíto');
        } catch (\Throwable $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
