<x-awetemplate-layout>
<title>Biodata</title>
<style>
    .dropdown:hover .dropdown-menu {
    display: block;
  }
</style>
<h1 class="text-3xl text-black pb-6">Biodata Siswa</h1>
<!-- This example requires Tailwind CSS v2.0+ -->
<tbody class="text-black">
<div class="ml-auto">
<div class="dropdown inline-block relative">
  <button class="bg-blue-300 text-black font-semibold py-2 px-10 rounded inline-flex items-center">
    <span class="mr-1">Pilih Kelas</span>
    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
  </button>
  <ul class="dropdown-menu absolute hidden text-gray-700 pt-1">
    <li class="text-center"><a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-3 block whitespace-no-wrap" href="{{route('biodata.index')}}">6A</a></li>
    <li class="text-center"><a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-3 block whitespace-no-wrap" href="">6B</a></li>
    <li class="text-center"><a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-3  block whitespace-no-wrap" href="">5A</a></li>
    <li class="text-center"><a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-3  block whitespace-no-wrap" href="">5B</a></li>
    <li class="text-center"><a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-3 w-44  block whitespace-no-wrap" href="">4A</a></li>
  </ul>
</div>

</div>
</div>
</table>


</x-awetemplate-layout>
