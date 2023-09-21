@extends('layouts.app')

@section('content')
<div class="">
    <h1 class="text-4xl font-bold my-8 text-center text-teal-500">Tabel Normal</h1>
    <div class="relative overflow-x-auto ">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-teal-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Judul Buku
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Penulis
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Terbit
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data_buku as $buku)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                        {{ $buku->id }}
                    </td>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $buku->judul }}                        
                    </td>
                    <td class="px-6 py-4">
                        {{ $buku->penulis }}
                    </td>
                    <td class="px-6 py-4">
                        {{ "Rp ". number_format($buku->harga, 2, ',', '.') }}
                    </td>
                    <td class="px-6 py-4">
                        {{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('d/m/Y') }}
                    </td>
                    <td class="px-6 py-4 flex">
                        <a href="{{ route('buku.update', $buku->id) }}">
                            <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xs px-2 py-2.5 text-center mr-2 mb-2">Update</button>
                        </a>
                        <form action="{{ route('buku.destroy', $buku->id) }}" method="post">
                            @csrf
                            <button onclick="return confirm('Yakin dek?')" type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-xs px-3 py-2.5 text-center mr-2 mb-2">Hapus</button>
                        </form>
                        <a href="{{ route('buku.detail', $buku->id) }}">
                            <button type="submit" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-xs px-3 py-2.5 text-center mr-2 mb-2">Detail</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>  

<div class="flex justify-center my-16">
    <a href="{{ route('buku.create') }}"><button type="button" class=" text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Create Book</button></a>
</div>

<div class="mt-16">
    <h1 class="text-4xl font-bold my-8 text-center text-teal-500">Tabel Sorted By Id Descend</h1>
    <div class="relative overflow-x-auto ">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-teal-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Judul Buku
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Penulis
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Terbit
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data_buku_sorted as $buku)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                    {{ $no++ }}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $buku->judul }}                        </th>
                    <td class="px-6 py-4">
                    {{ $buku->penulis }}
                    </td>
                    <td class="px-6 py-4">
                       {{ "Rp ". number_format($buku->harga, 2, ',', '.') }}
                    </td>
                    <td class="px-6 py-4">
                    {{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('d/m/Y') }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<h1 class="text-4xl font-bold my-8 px-32 text-teal-500">Jumlah Tabel : {{ $length }}</h1>
<h1 class="text-4xl font-bold my-8 px-32 text-teal-500">Jumlah Harga : {{ "Rp ". number_format($harga, 2, ',', '.')  }}</h1>
@endsection