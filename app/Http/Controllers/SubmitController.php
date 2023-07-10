<?php

namespace App\Http\Controllers;

use App\Models\Submit;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;

class SubmitController extends Controller
{
    public function index(){
        $submits = Submit::all();
        dd(compact($submits));
        return view('dashboard', compact('submits'));
    }

    public function create(){
        return view('create');
    }

    public function insertdata(Request $request){
        //dd($request->all());
        //$data = Submit::create($request->all());
        $data = Submit::create([
                        'title' => request('title'),
                        //'image' => request('image'),
                        'caption' => request('caption'),
                        //'user_id' => auth()->id()
                       

        ]);
        
        if($request->hasFile('image')){ 
            $request->file('image')->move('imgart/', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('dashboard');//yang diganti
        
    }
    public function show($id)
    {
        $data = Submit::find($id);
        return view('data.show', compact('/'));
    }

    public function edit($id)
    {
        $data = Submit::find($id);
        return view('data.edit', compact('/insertdata'));
    }

    public function update(Request $request, $id)
    {
        $data = Submit::find($id);
        // Ambil data dari request dan perbarui model
        $data->title = $request->input('title');
        $data->caption = $request->input('caption');
        // ...
        $data->save();

        return redirect('/data')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = Submit::find($id);
        $data->delete();

        return redirect('/data')->with('success', 'Data berhasil dihapus.');
    }
}
