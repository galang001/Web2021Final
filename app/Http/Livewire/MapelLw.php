<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Jkel;

class MapelLw extends Component
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

    	return view('Livewire.mapel-lw', [
    		'mapel'		=>	Mapel::where(function($sub_query){
    							$sub_query->where('semester', 'like', '%'.$this->searchTerm.'%');
    						})->where('kd_kelas','like','%'.$this->searchTerm2.'%')
                ->join('kelas', 'kelas.id_kelas', '=', 'mapels.kd_kelas')
                    ->join('smt', 'mapels.semester', '=', 'smt.id_smt')
                ->paginate(5)
    	])->layout('layouts.mapeltemplate');
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
        $this->id_mapel=null;
        $this->user_id = '1';
        $this->nama_mapel = '';
        $this->semester = '';
        $this->kd_kelas = '';
    }

    public function store()
    {
        $this->validate([
            'nama_mapel' => 'required',
            'semester' => 'required',
            'kd_kelas' => 'required',
        ]);

        Mapel::updateOrCreate(['id_mapel' => $this->id_mapel], [
          'user_id'=>$this->user_id,
          'nama_mapel' => $this->nama_mapel,
          'semester' => $this->semester,
          'kd_kelas' => $this->kd_kelas,
        ]);

        session()->flash('message', $this->id_mapel ? 'Data Mata Pelajaran updated.' : 'Data Mata Pelajaran created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id_mapel)
    {
        $siswa = Mapel::findOrFail($id_mapel);
        $this->id_mapel=$siswa->id_mapel;
        $this->user_id = $siswa->user_id;
        $this->nama_mapel = $siswa->nama_mapel;
        $this->semester = $siswa->semester;
        $this->kd_kelas = $siswa->kd_kelas;

        $this->openModalPopover();
    }

    public function delete($id_mapel)
    {
        Mapel::find($id_mapel)->delete();
        session()->flash('message', 'Data Mata Pelajaran telah Dihapus.');
    }

  }
