<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>?
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <label for="exampleFormControlInput1"
                                class="block text-gray-700 text-sm font-bold mb-2">Nama Mata Pelajaran</label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="exampleFormControlInput1" placeholder="Enter Nama Mata Pelajaran" wire:model="nama_mapel">
                            @error('nama_mapel') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput2"
                                class="block text-gray-700 text-sm font-bold mb-2">Kelas</label>
                                <select id="kd_kelas" name="kd_kelas" class="mt-1 block w-1/4 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="kd_kelas">
                                  <option>Pilih Kelas</option>
                                  @foreach ($kelas as $item)
                                      <option value="{{$item->id_kelas}}" >{{$item->nama_kelas}}</option>
                                  @endforeach
                              </select>
                            @error('nis') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput2"
                                class="block text-gray-700 text-sm font-bold mb-2">Jenis Kelamin</label>
                                <select id="semester" name="semester" class="mt-1 block w-1/4 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" wire:model="semester">
                                  <option>Pilih Semester</option>
                                      <option value="1" >Ganjil (1)</option>
                                      <option value="2" >Genap (2)</option>
                              </select>
                            @error('semester') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>


                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="store()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-red-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Simpan
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="closeModalPopover()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-bold text-gray-700 shadow-sm hover:text-gray-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Close
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
