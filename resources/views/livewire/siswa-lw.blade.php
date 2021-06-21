<x-slot name="header">
    <h2 class="text-center">Laravel 8 Livewire CRUD Demo</h2>
</x-slot>
<title>Data Biodata Siswa</title>
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
            <button wire:click="create()"
                class="bg-green-700 text-white font-bold py-2 px-4 rounded my-3">Tambah Siswa</button>
                <input type="text" class="form-control" placeholder="Search" wire:model="searchTerm" />
            @if($isModalOpen)
            @include('livewire.create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">ID</th>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">NIS</th>
                        <th class="px-4 py-2">Kelas</th>
                        <th class="px-4 py-2">Jenis Kelamin</th>
                        <th class="px-4 py-2">Alamat</th>
                        <th class="px-4 py-2">Tanggal Lahir</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $student)
                    <tr>
                        <td class="border px-4 py-2">{{ (($users->currentPage() * 5) - 5) + $loop->iteration  }}</td>
                        <td class="border px-4 py-2">{{ $student->nama }}</td>
                        <td class="border px-4 py-2">{{ $student->nis}}</td>
                        <td class="border px-4 py-2">{{ $student->nama_kelas}}</td>
                        <td class="border px-4 py-2">{{ $student->jkel}}</td>
                        <td class="border px-4 py-2">{{ $student->alamat}}</td>
                        <td class="border px-4 py-2">{{ $student->tanggal_lahir}}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $student->id_user }})"
                                class="bg-blue-500  text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $student->id_user }})"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $users->links('livewire.siswa-pagination') }}
    </div>
</div>
