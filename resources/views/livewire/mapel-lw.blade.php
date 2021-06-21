<x-slot name="header">
    <h2 class="text-center">Laravel 8 Livewire CRUD Demo</h2>
</x-slot>
<title>Data Mata Pelajaran</title>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
            <select id="kd_kelas" name="kd_kelas" class="mt-1 block w-1/4 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="searchTerm2">
              <option value="">Pilih Kelas</option>
              @foreach ($kelas as $item)
                  <option value="{{$item->id_kelas}}" >{{$item->nama_kelas}}</option>
              @endforeach
          </select>
          <select id="semester" name="semester" class="mt-1 block w-1/4 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="searchTerm">
            <option value="">Pilih Semester</option>
                <option value="1" >Ganjil (1)</option>
                            <option value="2" >Genap (2)</option>
        </select>
            <button wire:click="create()"
                class="bg-green-700 text-white font-bold py-2 px-4 rounded my-3">Tambah Mata Pelajaran</button>
            @if($isModalOpen)
            @include('livewire.createmapel')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No</th>
                        <th class="px-4 py-2">Nama Mapel</th>
                        <th class="px-4 py-2">Kelas</th>
                        <th class="px-4 py-2">Semester</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mapel as $student)
                    <tr>
                        <td class="border px-4 py-2">{{ (($mapel->currentPage() * 5) - 5) + $loop->iteration  }}</td>
                        <td class="border px-4 py-2">{{ $student->nama_mapel }}</td>
                        <td class="border px-4 py-2">{{ $student->nama_kelas}}</td>
                        <td class="border px-4 py-2">{{ $student->nama_smt}}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $student->id_mapel }})"
                                class="bg-blue-500  text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $student->id_mapel }})"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $mapel->links('livewire.siswa-pagination') }}
    </div>
</div>
