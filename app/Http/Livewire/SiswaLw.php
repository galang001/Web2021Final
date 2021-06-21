<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use App\Models\Bio;
use App\Models\Kelas;
use App\Models\Jkel;

class SiswaLw extends Component
{
	use WithPagination;

	public $searchTerm;
  public $searchTerm2;
  public $isModalOpen = 0;
  public $kelas;
  public $currentPage = 1;
  public $nama_kelas, $id_kelas;
  public $id_user, $nama, $nis, $alamat, $user_id, $kd_kelas , $j_kelamin, $tanggal_lahir;
  public $jkelas;
  public $jkel, $id_jkel;

    public function render()
    {
    	$query = '%'.$this->searchTerm.'%';

     $this->kelas=Kelas::all();
     $this->jkelas=Jkel::all();

    	return view('Livewire.siswa-lw', [
    		'users'		=>	Bio::where(function($sub_query){
    							$sub_query->where('nama', 'like', '%'.$this->searchTerm.'%')
    									  ->orWhere('nis', 'like', '%'.$this->searchTerm.'%');
    						})->where('kd_kelas','like','%'.$this->searchTerm2.'%')
                ->join('kelas', 'kelas.id_kelas', '=', 'bios.kd_kelas')
                    ->join('jkels', 'bios.j_kelamin', '=', 'jkels.id_jkel')
                ->paginate(5)
    	])->layout('layouts.awetemplate');
    }

    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function(){
            return $this->currentPage;
        });
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm(){
        $this->id_user=null;
        $this->user_id = '1';
        $this->nama = '';
        $this->nis = '';
        $this->j_kelamin = '';
        $this->kd_kelas = '';
        $this->alamat = '';
        $this->tanggal_lahir = '';
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'nis' => 'required',
            'j_kelamin' => 'required',
            'kd_kelas' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        Bio::updateOrCreate(['id_user' => $this->id_user], [
          'user_id'=>$this->user_id,
          'nama' => $this->nama,
          'nis' => $this->nis,
          'j_kelamin' => $this->j_kelamin,
          'kd_kelas' => $this->kd_kelas,
          'alamat' => $this->alamat,
          'tanggal_lahir' => $this->tanggal_lahir,
        ]);

        session()->flash('message', $this->id_user ? 'Data Siswa updated.' : 'Data Siswa created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id_user)
    {
        $siswa = Bio::findOrFail($id_user);
        $this->id_user=$siswa->id_user;
        $this->user_id = $siswa->user_id;
        $this->nama = $siswa->nama;
        $this->nis = $siswa->nis;
        $this->j_kelamin = $siswa->j_kelamin;
        $this->kd_kelas = $siswa->kd_kelas;
        $this->alamat = $siswa->alamat;
        $this->tanggal_lahir = $siswa->tanggal_lahir;

        $this->openModalPopover();
    }

    public function delete($id_user)
    {
        Bio::find($id_user)->delete();
        session()->flash('message', 'Data Siswa telah Dihapus.');
    }

  }
