<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barangmasuk;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class BarangmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try
        {
            $barangmasuk = Barangmasuk::all(); 
            return response()->json([
                'status' => true,
                'message'   => 'Data Barangmasuk Ditemukan',
                'data'  => $barangmasuk
            ],Response::HTTP_OK);
        }
        catch(\Exception $e)
        {
            $e->getMessage();
        }
            return response()->json([
                'status'=> false,
                'message'=> 'Internal Server Error'
            ],Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        
        $validasi = Validator::make(
            $request->all(),
            [
                "tanggal_masuk" => "required|String",
                "nomor_invoice_masuk" => "required|String",
                "total" => "required|Numeric",
                "id_supplier"=> "required|String",
                //"created_by" =>"required|String", //bikin otomatis
            ]
        );

        if ($validasi->fails()) {
            return response()->json([
                "message" => "Gagal menginput data barang masuk",
                "error" => $validasi->errors()
            ], Response::HTTP_NOT_ACCEPTABLE);
        } else {
            $validated = $validasi->validated();
            try {
                $bikinbarangmasuk = Barangmasuk::create($validated);
                DB::commit();
                return response()->json([
                    "message" => "Berhasil menginput data barang masuk",
                    "data" => $bikinbarangmasuk
                ]);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json([
                    "message" => "Gagal menginput data barang masuk",
                    "error" => $e->getMessage()
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_barang_masuk)
    {
        try {
            $barangmasuk = Barangmasuk::findOrFail($id_barang_masuk);

            return response()->json([
                "message" => "Berhasil ditemukan barang masuk ",
                "data" => $barangmasuk
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                "message" => "Gagal ditemukan barang masuk",
                "error" => $e->getMessage()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();

        $Validator = Validator::make(
            $request->all(),
            [
                "tanggal_masuk" => "Date",
                "nomor_invoice_masuk" => "String",
                "total" => "Double",
                "id_supplier" => "Integer",
                "created_by" => "String",
            ]
        );
        if ($Validator->fails()) {
            return response()->json([
                "message" => "Gagal melakukan validasi tipe data barang masuk",
                "error" => $Validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            $Validated = $Validator->validated();
            try {
                $barangmasuk =  Barangmasuk::findOrFail($id);
                DB::commit();
                if (!$barangmasuk) {
                    return response()->json([
                        "message" => "Data barang masuk tidak ditemukan"
                    ], Response::HTTP_NOT_FOUND);
                }
                $barangmasuk->update($Validated);
                return response()->json([
                    "message" => "Data barang masuk berhasil diperbarui",
                    "data" => $barangmasuk
                ]);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json([
                    "message" => "Data barang masuk gagal diperbarui",
                    "error" => $e->getMessage()
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_barang_masuk)
    {
        $data_barang_masuk = Barangmasuk::find($id_barang_masuk);
        if(empty($data_barang_masuk))
        {
            return response()->json([
                'status' =>false,
                'message'=>'Data tidak ditemukan'
            ],400);
        }

        $_POST = $data_barang_masuk->delete();

        return response()->json([
            'status' => true,
            'message'=>'Sukses melakukan delete data'
        ]);
    }
}