<x-hometemplate-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
	<div class="flex h-full bg-white rounded overflow-hidden shadow-lg">
					<a href="post.html" class="flex flex-wrap no-underline hover:no-underline">
						<div class="w-full md:w-2/3 rounded-t">	
							<img src="https://source.unsplash.com/collection/494263/800x600" class="h-full w-full shadow">
						</div>

						<div class="w-full md:w-1/3 flex flex-col flex-grow flex-shrink">
							<div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg">
								<p class="w-full text-gray-600 text-xs md:text-sm pt-6 px-6">GETTING STARTED</p>
								<div class="w-full font-bold text-xl text-gray-900 px-6">👋 Welcome fellow Tailwind CSS and Ghost fan</div>
								<p class="text-gray-800 font-serif text-base px-6 mb-5">
									This starter template is an attempt to replicate the default Ghost theme "Casper" using Tailwind CSS and vanilla Javascript.
								</p>
							</div>

							<div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow-lg p-6">
								<div class="flex items-center justify-between">
									<img class="w-8 h-8 rounded-full mr-4 avatar" data-tippy-content="Author Name" src="http://i.pravatar.cc/300" alt="Avatar of Author">
									<p class="text-gray-600 text-xs md:text-sm">1 MIN READ</p>
								</div>
							</div>
						</div>

					</a>
				</div>
</x-hometemplate-layout>
