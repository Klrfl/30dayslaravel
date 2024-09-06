 <x-layout title="Gitar">
     <header class="py-4 h-max col-span-6 md:sticky md:top-0 md:col-span-2">
         <h1>GitarDB</h1>
         <p class="leading-relaxed my-2">Kumpulan gitar</p>

         <form hx-post="{{ route('guitars.store') }}" hx-target="#list" hx-swap="afterbegin"
             class="form-control p-4 gap-2 shadow-md rounded-lg">
             @csrf
             <label for="nama">Nama</label>
             <input type="text" id="nama" name="name" class="input input-bordered" placeholder="nama"
                 required />

             <label for="model">Model</label>
             <input type="text" id="model" class="input input-bordered" name="model" placeholder="model"
                 required />

             <label for="category_id">Kategori</label>
             <select name="category_id" id="category_id" id="category" class="select select-bordered">
                 <option value="" disabled selected>Pilih satu</option>
                 @foreach ($categories as $category)
                     <option value="{{ $category->id }}">{{ $category->name }}</option>
                 @endforeach
             </select>

             <label for="description">deskripsi</label>
             <input type="text" id="description" class="input input-bordered" name="description"
                 placeholder="deskripsi" required />

             <label for="price">harga</label>
             <input type="number" id="price" class="input input-bordered" name="price" min="0"
                 placeholder="harga" required />

             <button class="btn outline outline-primary">Tambah gitar</button>
         </form>
     </header>

     <div class="pt-4 pb-12 overflow-auto col-span-6 md:col-span-4">
         <table class="table table-zebra" hx-target="closest tr" hx-swap="outerHTML swap:500ms">
             <thead>
                 <tr class="text-left">
                     <th class="p-2">Nama</th>
                     <th class="p-2">Model</th>
                     <th class="p-2">Kategori</th>
                     <th class="p-2">Harga</th>
                     <th class="p-2 text-right">Aksi</th>
                 </tr>
             </thead>

             <tbody id="list">
                 @empty($guitars)
                     <tr>
                         <td> Tidak ada gitar di sini. </td>
                     </tr>
                 @endempty

                 @foreach ($guitars as $guitar)
                     <x-guitar :guitar="$guitar" />
                 @endforeach

             </tbody>
         </table>
     </div>

     <!-- this element is for the initial swap -->
     <div id="dialog"></div>
 </x-layout>
