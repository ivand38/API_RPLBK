<?php

namespace App\Http\Controllers\Api;

use App\Models\Valo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ValoResource;
use Illuminate\Support\Facades\Validator;


class ValoController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $valos = Valo::all();

        //return collection of posts as a resource
        return new ValoResource(true, 'List Data Agent Valorant', $valos);
    }
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'id'     => 'required',
            'nama'     => 'required',
            'role'   => 'required',
            'isDuelist'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $valo = Valo::create([
            'id'     => $request->id,
            'nama'     => $request->nama,
            'role'   => $request->role,
            'isDuelist'   => $isDuelist->role,
        ]);

        //return response
        return new ValoResource(true, 'Data Agent Valo Berhasil Ditambahkan!', $valo);
    }
    public function show(Valo $valo)
    {
        //return single post as a resource
        return new ValoResource(true, 'Data Agent Ditemukan!', $valo);
    }
    public function update(Request $request, Valo $valo)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
            'role'   => 'required',
            'isDuelist'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $valo->update([
            'nama'     => $request->nama,
            'role'   => $request->role,
            'isDuelist'   => $isDuelist->role,
        ]);

        //return response
        return new ValoResource(true, 'Data Agent Berhasil Diubah!', $valo);
    }
    public function destroy(Valo $valo)
    {
        //delete post
        $valo->delete();

        //return response
        return new ValoResource(true, 'Data Agent Berhasil Dihapus!', null);
    }
    public function search($nama){
        return Valo::where('nama',$nama)->get();
    }
}
