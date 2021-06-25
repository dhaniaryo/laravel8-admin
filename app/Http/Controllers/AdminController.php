<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jual;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function admindashboard(){
        $pengguna = User::where('is_admin','no')->count();
        $semua = Jual::all()->count();
        $jasa = Jual::where('kategori_jual','Jasa')->count();
        $barang = Jual::where('kategori_jual','Barang')->count();

        return view('admin.admindashboard',compact('pengguna','semua','jasa','barang'));
    }

    //data pengguna
    public function lihatdatapengguna()
    {
        $pengguna=User::where('is_admin', 'no')->where('statususer','aktif')->orderBy('created_at','desc')->get();
        return view('admin.adminpengguna', compact('pengguna'));
    }
   
    public function tambahdatapengguna()
    {
        return view('admin.adminpenggunatambah');
    }
    public function prosestambahdatapengguna(Request $request){
		$this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
		]);
 		User::create([
            'name' => $request->name, 
            'email' => $request->email, 
			'password' => Hash::make($request->password), 
            'statususer' => "aktif",
            'is_admin' => 'no',
		]);
		return redirect(route('lihatdatapengguna'));
    }

    public function hapusdatapengguna(Request $request, $id)
    {   
        //Proses hapus data pengguna menggunakan pengubahan status user, jadi data pengguna tidak dihapus di database
        // hanya saja mengubah status menjadi "nonaktif"
        DB::table('users')->where('id',$request->id)->update([
            'statususer' => "nonaktif", 
        ]);
        return redirect(route('lihatdatapengguna'));
    }

    public function ubahdatapengguna($id)
    {
        $pengguna = User::where('id', '=', $id)->get();
        return view ('admin.adminpenggunaubah', compact('pengguna'));
    }

    public function ubahdatapenggunaproses(Request $request, $id)
    {   
        DB::table('users')->where('id',$request->id)->update([
            'name' => $request->name, 
            'email' => $request->email,
        ]);
        return redirect(route('lihatdatapengguna'));
    }




    //Jasa
    public function datajualjasasemua(){
        $semua = Jual::where('kategori_jual','Jasa')->where('status_jual','Masuk')->get();
        return view('admin.adminjualjasasemua',compact('semua'));
    }
    public function tambahdatajualjasa(){
        return view('admin.adminjualjasatambah');
    }


    //Barang
    public function datajualbarangsemua(){
        $semua = Jual::where('kategori_jual','Barang')->where('status_jual','Masuk')->get();
        return view('admin.adminjualbarangsemua',compact('semua'));
    }
    public function tambahdatajualbarang(){
        return view('admin.adminjualbarangtambah');
    }

    //proses tambah data jual 
    public function tambahdatajualproses(Request $request){
        // $request->validate([
        //     'nama_jual' => 'required',
        //     'created_by' => 'required',
        //     'kategori_jual' => 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'harga_jual'=>'required',
        // ]);
  
        // $input = $request->all();
  
        // if ($image = $request->file('image')) {
        //     $destinationPath = 'image/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $input['image'] = "$profileImage";
        // }
    
        // Product::create($input);
     
        // return redirect()->back();

        $this->validate($request, [
            'nama_jual' => 'required',
            'created_by' => 'required',
			'kategori_jual' => 'required',
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:3000',
			'status_jual' => 'required',
			'harga_jual' => 'required',
		]);
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
		$nama_file = time()."_".$file->getClientOriginalName();
		
      	// isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);

        //simpan ke dalam table menu
        Jual::create([
            'nama_jual' => $request->nama_jual,
			'created_by' => $request->created_by,
			'kategori_jual' => $request->kategori_jual,
			'foto_jual' => $nama_file,
			'status_jual' => $request->status_jual,
			'harga_jual' => $request->harga_jual,
        ]);

		return redirect()->back();
    }

    public function ubahdatajual($id){
        $semua = Jual::where('id',$id)->get();
        return view('admin.adminjualubah',compact('semua'));
    }

    public function ubahdatajualproses(Request $request,$id){
        // $request->validate([
        //     'nama_jual' => 'required',
        //     'created_by' => 'required',
        //     'kategori_jual' => 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'harga_jual'=>'required',
        // ]);
  
        // $input = $request->all();
  
        // if ($image = $request->file('image')) {
        //     $destinationPath = 'image/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $input['image'] = "$profileImage";
        // }
    
        // Product::create($input);
     
        // return redirect(route('admindashboard'));
        $this->validate($request, [
            'nama_jual' => 'required',
            'created_by' => 'required',
			'kategori_jual' => 'required',
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:3000',
            'status_jual' => 'required',
			'harga_jual' => 'required',
		]);
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
		$nama_file = time()."_".$file->getClientOriginalName();
		
      	// isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);

        //simpan ke dalam table menu
        DB::table('juals')->where('id',$request->id)->update([
            'nama_jual' => $request->nama_jual,
			'created_by' => $request->created_by,
			'kategori_jual' => $request->kategori_jual,
			'foto_jual' => $nama_file,
			'status_jual' => $request->status_jual,
			'harga_jual' => $request->harga_jual,
        ]);

		return redirect(route('admindashboard'));   
    }

    //proses hapus jual
    public function hapusdatajual($id){
        Jual::destroy($id);
        return redirect()->back();
    }



    //Data Rekap Semua
    public function datarekapsemua(){
        $semua = Jual::where('created_by','admin')->get();

        return view('admin.adminrekapsemua',compact('semua'));
    }
    public function datarekaphari(){
        // $semua = Jual::where('created_by','admin')->get();

        $semua = Jual::whereDate('created_at', Carbon::today())->get();
        return view('admin.adminrekaphari',compact('semua'));
    }
    public function datarekapbulan(){
        // $semua = Jual::where('created_by','admin')->get();

        $semua = Jual::whereMonth('created_at', '=',date('m'))->get();
        return view('admin.adminrekapbulan',compact('semua'));
    }
    public function datarekaptahun(){
        $semua = Jual::whereYear('created_at', '=',date('Y'))->get();
        
        return view('admin.adminrekaptahun',compact('semua'));
    }



    //Data Pengeluaran Semua
    public function datapengeluaransemua(){
        $semua = Jual::where('status_jual','keluar')->get();
        return view('admin.adminpengeluaransemua',compact('semua'));
    }

    public function tambahdatapengeluaran(){
        return view('admin.adminpengeluarantambah');
    }
    public function tambahdatapengeluaranproses(Request $request){
        // $request->validate([
        //     'nama_jual' => 'required',
        //     'created_by' => 'required',
        //     'kategori_jual' => 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'harga_jual'=>'required',
        // ]);
  
        // $input = $request->all();
  
        // if ($image = $request->file('image')) {
        //     $destinationPath = 'image/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $input['image'] = "$profileImage";
        // }
    
        // Product::create($input);
     
        // return redirect()->back();

        $this->validate($request, [
            'nama_jual' => 'required',
            'created_by' => 'required',
			'kategori_jual' => 'required',
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:3000',
			'status_jual' => 'required',
			'harga_jual' => 'required',
		]);
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
		$nama_file = time()."_".$file->getClientOriginalName();
		
      	// isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);

        //simpan ke dalam table menu
        Jual::create([
            'nama_jual' => $request->nama_jual,
			'created_by' => $request->created_by,
			'kategori_jual' => $request->kategori_jual,
			'foto_jual' => $nama_file,
			'status_jual' => $request->status_jual,
			'harga_jual' => $request->harga_jual,
        ]);

		return redirect()->back();
    }

    public function ubahdatapengeluaran($id){
        $semua = Jual::where('id',$id)->get();
        return view('admin.adminpengeluaranubah',compact('semua'));
    }

    public function ubahdatapengeluaranproses(Request $request,$id){
        // $request->validate([
        //     'nama_jual' => 'required',
        //     'created_by' => 'required',
        //     'kategori_jual' => 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'harga_jual'=>'required',
        // ]);
  
        // $input = $request->all();
  
        // if ($image = $request->file('image')) {
        //     $destinationPath = 'image/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $input['image'] = "$profileImage";
        // }
    
        // Product::create($input);
     
        // return redirect(route('admindashboard'));
        $this->validate($request, [
            'nama_jual' => 'required',
            'created_by' => 'required',
			'kategori_jual' => 'required',
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:3000',
            'status_jual' => 'required',
			'harga_jual' => 'required',
		]);
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
		$nama_file = time()."_".$file->getClientOriginalName();
		
      	// isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);

        //simpan ke dalam table menu
        DB::table('juals')->where('id',$request->id)->update([
            'nama_jual' => $request->nama_jual,
			'created_by' => $request->created_by,
			'kategori_jual' => $request->kategori_jual,
			'foto_jual' => $nama_file,
			'status_jual' => $request->status_jual,
			'harga_jual' => $request->harga_jual,
        ]);

		return redirect(route('admindashboard'));   
    }
    //proses hapus jual
    public function hapusdatapengeluaran($id){
        Jual::destroy($id);
        return redirect()->back();
    }

}
