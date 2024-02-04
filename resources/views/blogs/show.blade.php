<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 mt-6 mb-6">
       <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
        <section class="col-span-1 lg:col-span-3">
            <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
                <div class="absolute left-0 bottom-0 w-full h-full z-10"
                  style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
                <img src="{{ Storage::url($blog->image->url) }}" class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
                <div class="p-4 absolute bottom-0 left-0 z-20">
                    @foreach ($blog->tags as $tag)
                            
                    <a href="https://codersfree.com/posts?tag=diseño web">
                        <span class="bg-{{ $tag->color }}-100 text-indigo-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-200 dark:text-indigo-900">
                            {{ $tag->name }}
                        </span>
                    </a>
                    @endforeach
                  <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
                    {{ $blog->name }}
                  </h2>
                  <div class="flex mt-3">
                    <img src="{{ $blog->user->profile_photo_url }}"
                      class="h-10 w-10 rounded-full mr-2 object-cover" />
                    <div>
                      <p class="font-semibold text-gray-200 text-sm">{{ $blog->user->name }}</p>
                      <p class="font-semibold text-gray-400 text-xs"> - {{date("d m Y", strtotime($blog->created_at))}}</p>
                    </div>
                  </div>
                </div>
              </div>
        
              <div class="px-4 lg:px-0 mt-12 text-gray-700 max-w-screen-md mx-auto text-lg leading-relaxed">                
        
                <p class="pb-6">{{ $blog->body }}</p>
        
              </div>
        </section>
        <aside class="col-span-1 hidden lg:block">
            <h1 class="text-xl font-semibold mb-6">Artículos Similares </h1><h1 class="text-2xl  text-slate-700font-bold mb-6">"{{$blog->category->name}}"</h1>


            <div class="space-y-4">
                @forelse ($similares as $similare)
                    <article class="grid grid-cols-2 gap-2">
                    <a href="{{ route('blogs.show' ,$similare) }}" class="block">

                        <figure>
                            <img class="aspect-[16/9] object-cover object-center"
                                src="{{ Storage::url($similare->image->url) }}"
                                alt="">
                        </figure>

                    </a>
                    
                    <div>
                        <a href="{{ route('blogs.show' ,$similare) }}" class="block">
                        </a>
                        <h1 class="text-sm font-semibold">
                            <a
                                href="{{ route('blogs.show' ,$similare) }}"
                                class="block">
                                {{ $similare->name }}
                            </a>
                            <a href="{{ route('blogs.show' ,$similare) }}">
                                
                            </a>
                        </h1>
                        <div class="flex mt-1">
                            <img src="{{ $similare->user->profile_photo_url }}"
                              class="h-10 w-10 rounded-full mr-2 object-cover" />
                            <div>
                              <p class="font-semibold text-gray-700 text-sm">{{ $similare->user->name }}</p>
                            </div>
                          </div>
                    </div>


                </article>
                @empty
                    
                @endforelse
                
                
            </div>

        </aside>
    </div> 
    </div>
    

</x-app-layout>