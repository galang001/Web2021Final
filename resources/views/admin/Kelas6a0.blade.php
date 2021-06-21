<x-awetemplate-layout>
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
              <button wire:click="create()"
                  class="bg-green-700 text-white font-bold py-2 px-4 rounded my-3">Create Student</button>
              @if($isModalOpen)
              @include('livewire.create')
              @endif
              <table class="table-fixed w-full">
                  <thead>
                      <tr class="bg-gray-100">
                          <th class="px-4 py-2 w-20">No.</th>
                          <th class="px-4 py-2">Nama</th>
                          <th class="px-4 py-2">NIS</th>
                          <th class="px-4 py-2">Kelas</th>
                          <th class="px-4 py-2">Jenis Kelamin</th>
                          <th class="px-4 py-2">Alamat</th>
                          <th class="px-4 py-2">Tanggal Lahir</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($siswa as $student)
                      <tr>
                          <td class="border px-4 py-2">{{ $student->id }}</td>
                          <td class="border px-4 py-2">{{ $student->nama }}</td>
                          <td class="border px-4 py-2">{{ $student->nis}}</td>
                          <td class="border px-4 py-2">{{ $student->nama_kelas}}</td>
                          <td class="border px-4 py-2">{{ $student->jkel}}</td>
                          <td class="border px-4 py-2">{{ $student->alamat}}</td>
                          <td class="border px-4 py-2">{{ $student->tanggal_lahir}}</td>
                          <td class="border px-4 py-2">
                              <button wire:click="edit({{ $student->id_user}})"
                                  class="bg-blue-500  text-white font-bold py-2 px-4 rounded">Edit</button>
                              <button wire:click="delete({{ $student->id_user}})"
                                  class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>

</x-awetemplate-layout>
