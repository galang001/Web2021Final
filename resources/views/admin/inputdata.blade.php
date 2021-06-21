<x-awetemplate-layout>
<title>Input Biodata Siswa</title>
<h1 class="text-3xl text-black pb-6">Biodata Siswa</h1>
<form action="{{(isset($bio))?route('biodata.update',$bio->id):route('biodata.store')}}" method="POST">
    @csrf
    @if(isset($bio))
      @method('PUT')
    @endif
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" value="{{(isset($bio))?$bio->nama:old('nama')}}" class="@error('nama') border-red-500 @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                <div class="text-xs text-red-600">@error('nama'){{$message}}@enderror</div>
              </div>
              <div class="col-span-6 sm:col-span-3">
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="nis" class="block text-sm font-medium text-gray-700">NIS</label>
                <input type="text" name="nis" id="nis" value="{{(isset($bio))?$bio->nis:old('nis')}}" class="@error('nis') border-red-500 @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                <div class="text-xs text-red-600">@error('nis'){{$message}}@enderror</div>
              </div>
              <div class="col-span-6 sm:col-span-3">
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="j_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                <select id="j_kelamin" name="j_kelamin" class="mt-1 block w-1/4 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  @foreach ($jkel as $item)
                      <option value="{{$item->id_jkel}}" >{{$item->jkel}}</option>
                  @endforeach
              </select>
              </div>

              <div class="">

              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="kd_kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                <select id="kd_kelas" name="kd_kelas" class="mt-1 block w-1/4 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  @foreach ($kelas as $item)
                      <option value="{{$item->id_kelas}}" >{{$item->nama_kelas}}</option>
                  @endforeach
              </select>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                <input type="text" name="alamat" id="alamat" value="{{(isset($bio))?$bio->alamat:old('alamat')}}"  class="@error('alamat') border-red-500 @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-9/12 shadow-sm sm:text-sm border-gray-300 rounded-md">
                <div class="text-xs text-red-600">@error('alamat'){{$message}}@enderror</div>
              </div>

              <div class="col-span-6">
                <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                <input type="text" name="tanggal_lahir" id="tanggal_lahir" value="{{(isset($bio))?$bio->tanggal_lahir:old('tanggal_lahir')}}" class="@error('tanggal_lahir') border-red-500 @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-50 shadow-sm sm:text-sm border-gray-300 rounded-md">
                <div class="text-xs text-red-600">@error('tanggal_lahir'){{$message}}@enderror</div>
              </div>
            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Save
            </button>
          </div>
        </div>
      </form>
</x-awetemplate-layout>
