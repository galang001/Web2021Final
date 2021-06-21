<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Jkel;

class KelasLw extends Component
{
	use WithPagination;

	public $searchTerm;
  public $searchTerm2;
  public $isModalOpen = 0;
  public $kelas;
  public $currentPage = 1;
  public $nama_kelas, $id_kelas;
  public $id_mapel, $user_id, $nama_mapel, $semester, $alamat, $kd_kelas;
  public $jkelas;
  public $jkel, $id_jkel;

    public function render()
    {
    	$query = '%'.$this->searchTerm.'%';

     $this->kelas=Kelas::all();
     $this->jkelas=Jkel::all();

    	return view('Livewire.kelas-lw')->layout('layouts.kelastemplate');
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
        $this->id_kelas=null;
        $this->user_id = '1';
        $this->nama_kelas = '';

    }

    public function store()
    {
        $this->validate([
            'nama_kelas' => 'required',
        ]);

        Kelas::updateOrCreate(['id_kelas' => $this->id_kelas], [
          'user_id'=>$this->user_id,
          'nama_kelas' => $this->nama_kelas,
        ]);

        session()->flash('message', $this->id_kelas ? 'Data Kelas updated.' : 'Data Kelas created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id_kelas)
    {
        $siswa = Kelas::findOrFail($id_kelas);
        $this->id_kelas=$siswa->id_kelas;
        $this->nama_kelas = $siswa->nama_kelas;

        $this->openModalPopover();
    }

    public function delete($id_kelas)
    {
        Kelas::find($id_kelas)->delete();
        session()->flash('message', 'Data Kelas telah Dihapus.');
    }

  }
