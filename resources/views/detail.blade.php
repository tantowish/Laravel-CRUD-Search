@extends('layouts.app')

@section('content')

<div class="flex justify-center items-center py-32">
    <div class="max-w-sm py-10 px-16 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <h5 class="mb-3 text-2xl font-bold tracking-tight text-gray-900 dark:text-white lg:text-3xl">Detail Buku</h5>
        </a>
        <p class="mb-2 font-normal text-gray-700 dark:text-gray-400 lg:text-lg">Judul : {{ $buku->judul }}</p>
        <p class="mb-2 font-normal text-gray-700 dark:text-gray-400 lg:text-lg">By. {{ $buku->penulis }}</p>
        <p class="mb-2 font-normal text-gray-700 dark:text-gray-400 lg:text-lg">Tanggal terbit : {{ $buku->tgl_terbit }}</p>
        <p class="mb-2 font-normal text-gray-700 dark:text-gray-400 lg:text-lg">{{ "Rp ". number_format($buku->harga, 2, ',', '.') }}</p>
        <div class="flex justify-center mt-4">
            <a href="\buku"><button type="button" class=" text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Back</button></a>
        </div>
        
    </div>
</div>

@endsection