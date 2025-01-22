<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

</head>
<body class="bg-gray-200">
    {{-- tah iye card tah --}}
    <div x-data="{open: false, openChart: false}">
        <div x-data="sppData">
        <div class="w-ful capitalize p-10">
            <div class="flex justify-between text-center items-center text-3xl " style="">
                <h1 ><-- kembali</h1> 
                <div class="">
                    <div id="notif-bayar" style="transform: translateX(40px) translateY(2px)" class=" text-[.5rem] w-4 h-4 absolute rounded-full bg-red-500" x-show="$store.cart.quantity"><p style="transform: translateY(-10px)" class="text-[10px] text-white" x-text="$store.cart.quantity"></p></div>

                    <i @click="openChart = !openChart" class='bx bx-cart text-[3rem] text-green-700 cursor-pointer' >
                    </i>

                </div>

            </div>
            <div x-data="{openData: false};" class="grid  grid-cols-mamutsm sm:grid-cols-mamutmd md:grid-cols-mamutlg xl:grid-cols-mamutxl md:justify-center justify-center mt-16 gap-10 s">
                <template x-for="item in items" :key="item.id">
                    <div class="grid grid-cols-2 rounded-xl p-5 bg-white ">
                        <div class="flex flex-col gap-y-[41px]">
                            <p></p>
                            <h1 class="text-2xl">spp bulan <span x-text="item.bulan"></span></h1>
                            <p>total biaya</p>
                        </div>
                        <div class="flex items-end flex-col gap-y-5">
                            <button><i @click="$store.cart.add(item);" class='bx bx-cart text-[2rem] text-green-700 cursor-pointer hover:bg-green-800'></i></button>
                            <div x-data="{ openData: false }" @click="openData = !openData" class="check p-2 mb-5 border-green-700 text-green-700 border-2 w-14 h-14 hover:bg-black hover:bg-opacity-10 rounded-md"><i x-show="openData" class='bx bx-check text-[2rem]' ></i></div>
                            <p x-text="formatRupiah(item.harga)"></p>
                            <hr class="w-[100%] text-black">
                            
                            <p @click="$store.cart.add(item); open = true" class="bg-green-700 text-white py-2 px-8 rounded-md cursor-pointer">
                                Bayar
                            </p>
                        </div>
                    </div>              
                </template>

            </div>
        </div>
        

        {{-- input data diri tah iye  --}}
        <div  x-show="open" class="flex fixed w-full h-screen items-center justify-center bg-black bg-opacity-20 top-0">
            <div class="flex  justify-center flex-col bg-white p-10 rounded-xl text-2xl capitalize gap-2 relative">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 text-xl capitalize">
                    <i @click="open = false" class="bx bx-x right-0 absolute top-0 text-2xl"></i>

                    <dl class="max-w-md text-gray-900 divide-y divide-gray-200 p-5">

                        <div class="flex flex-col pb-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">nama</dt>
                            <dd class="text-lg font-semibold">{{ $user->name }}</dd>
                        </div>
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">kelas</dt>
                            <dd class="text-lg font-semibold">{{ $user->kelas }}</dd>
                        </div>
                        <div class="flex flex-col pt-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">no hp</dt>
                            <dd class="text-lg font-semibold">+00 123 456 789 / +12 345 678</dd>
                        </div>
                    </dl>
                    
                      <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b ">
                          <button class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">bayar</button>
                      </div>
                  </div>
            </div>
        </div>
        <div  x-show="openChart" class="flex fixed w-full h-screen items-center justify-center bg-black bg-opacity-20 top-0">
            <div class="flex  justify-center flex-col bg-white p-10 rounded-xl text-2xl capitalize gap-2 relative">
                <i @click="openChart = false" class="bx bx-x right-0 absolute top-0 text-2xl"></i>
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 text-xl capitalize w-80">
                    <h3 class="text-lg font-bold text-center mt-2">Detail pembayaran</h3>
                    <dl class="max-w-md text-gray-900 divide-y divide-gray-200 p-5">

                        <div class="flex flex-col pb-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Detail</dt>
                            <template x-for="(item, index) in $store.cart.items" :key="index">
                            <div class="flex items-start">
                                <dd class="text-lg font-semibold mx-10" x-text="item.bulan"></dd>
                                <dd class="text-lg font-semibold ml-5" x-text="item.harga"></dd>
                                <button id="remove" class="ml-auto p-0 bg-transparent border-none flex items-center ">
                                    <i class="bx bx-x right-0 absolute text-2xl"></i>
                                </button>
                            </div>  
                            </template>                                                      
                        </div>
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">total</dt>
                            <dd class="text-lg font-semibold" x-text="formatRupiah(item.total)"></dd>
                        </div>
                    
                    </dl>
                    
                    
                      <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b ">
                          <button class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">bayar</button>
                      </div>
                  </div>
            </div>
        </div>
        </div>
    </div>
      <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script>
        window.sppItems = @json($items); // Menyimpan data ke variabel global
    </script>
    <script src="assets/js/spp.js"></script>

</body>
</html>