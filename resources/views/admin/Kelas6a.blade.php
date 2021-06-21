<x-awetemplate-layout>
<title>Biodata Siswa</title>
<!-- <h1 class="pb-3"><a href="javascript:window.history.back();" class="underline">Kembali</a></h1> -->
<h1 class="text-3xl text-black pb-6">Biodata Siswa</h1>
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="table-auto min-w-full  divide-gray-200">
          <thead class="bg-gray-800 text-white">
            <tr>
              <th scope="col" class="px-5 py-2 text-left text-xs font-semibold font-medium uppercase tracking-wider">
                No
              </th>
              <th scope="col" class="px-7 py-3 text-left text-xs font-semibold font-medium uppercase tracking-wider">
                Nama
              </th>
              <th scope="col" class="px-7 py-3 text-left text-xs font-semibold font-medium uppercase tracking-wider">
                NIS
              </th>
              <th scope="col" class="px-7 py-3 text-left text-xs font-semibold font-medium uppercase tracking-wider">
                Jenis Kelamin
              </th>
              <th scope="col" class="px-7 py-3 text-left text-xs font-semibold font-medium uppercase tracking-wider">
                Kelas
              </th>
              <th scope="col" class="px-7 py-3 text-left text-xs font-semibold font-medium uppercase tracking-wider">
                Alamat
              </th>
              <th scope="col" class="px-9 py-3 text-left text-xs font-semibold font-medium uppercase tracking-wider">
                Tanggal Lahir
                </th>
                <th scope="col" class="w-max" >
                </th>
                </th>
                <th scope="col" class="w-max" >
                </th>
                </th>
                <th scope="col" class="w-max" >
                </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-400 text-left">
          <div class=" items-center justify-end ">
        <a href="{{route('biodata.create')}}" class=" mb-3 whitespace-nowrap inline-flex items-center justify-center px-1 py-1 border border-transparent rounded-md shadow-sm text-base font-small text-white bg-indigo-600 hover:bg-indigo-700">
          Tambah
        </a>
      </div>
            @if ($bio->count() == 0)
            <tr>
                <td colspan="5">No Data to display.</td>
            </tr>
            @endif
            <div class="flex items-center">
              @foreach ($bio as $item)
                  <td class="px-5 py-2 text-left font-medium">{{ (($bio->currentPage() * 5) - 5) + $loop->iteration  }}</td>
                  <td class="px-8 py-3 text-left font-medium">{{$item->nama}}</td>
                  <td class="px-8 py-3 text-left font-medium">{{$item->nis}}</td>
                  <td class="px-8 py-3 text-left font-medium">{{$item->jkel}}</td>
                  <td class="px-8 py-3 text-left font-medium">{{$item->nama_kelas}}</td>
                  <td class="px-8 py-3 text-left font-medium">{{$item->alamat}}</td>
                  <td class="px-8 py-3 text-left font-medium">{{$item->tanggal_lahir}}</td>
                  <td>
                  <form action="{{route('biodata.destroy',$item->id_user)}}"  method="POST">
                    @csrf
                    @method('DELETE')
                    <td class="text-left font-medium"><a href="{{route('biodata.edit',$item->id_user)}}" class="btn btn-xs p-2 rounded bg-blue-200 m-3 hover:bg-blue-600 hover:text-white">Edit</a></td>
                    <td class="text-left font-medium"><button class="btn btn-xs p-2 rounded bg-red-200 m-3 hover:bg-red-800 hover:text-white">Delete</button></td>
                    </form>
                    </td>
            </div>
            </tr>
              @endforeach
            </tr>

            <!-- More items... -->
            </tbody>
        </table>
        {{ $bio->links() }}

      </div>
    </div>
  </div>
</div>




</x-awetemplate-layout>
