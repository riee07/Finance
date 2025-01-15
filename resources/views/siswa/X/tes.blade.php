<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div x-data="{open: false}">
        <div class="w-ful capitalize p-10 bg-gray-200">
            <div class="flex justify-between text-center items-center text-3xl " style="">
                <h1 ><-- kembali</h1> 
                <i class='bx bx-cart text-[3rem] text-green-700' ></i>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 mt-16 gap-10 s">
                <div class="grid grid-cols-2 rounded-md p-5 bg-white ">
                    <div class="flex flex-col gap-y-10">
                        <p></p>
                        <h1 class="text-3xl mt-[1.95rem]">spp bulan januari</h1>
                        <p>total biaya</p>
                    </div>
                    <div class="flex items-end flex-col gap-y-10">
                        <i class='bx bx-cart text-[2rem] text-green-700' ></i>
                        <div class="p-2 mb-5 border-green-700 text-green-700 border-2 rounded-md"><i class='bx bx-check text-[2rem]' ></i></div>
                        <p>300.000</p>
                        <hr class="w-[100%] text-black">
                        
                        <p @click="open = true" class="bg-green-700 text-white py-2 px-8 rounded-md cursor-pointer" >bayar</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div x-show="open" class="flex fixed w-full h-screen items-center justify-center bg-black bg-opacity-20 top-0">
            <div class="flex  justify-center flex-col bg-white p-10 rounded-xl text-2xl capitalize gap-2 relative">
                <i @click="open = false" class='bx bx-x absolute right-0 top-0 m-5 text-2xl cursor-pointer' ></i>
                <p class="mb-3 font-bold">input data diri</p>
                <h2>nama: mamut</h2>
                <p>kelas: xipplg3</p>
                <p>no hp: 0812345678859</p>
                <hr class="mt-5 ">
        
                <p class="font-bold">total: 300.00</p>
                <a href="" class="bg-green-700 text-white p-2 px-5 rounded-md mt-10 ">lanjut</a>
            </div>
        </div>
    </div>
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
