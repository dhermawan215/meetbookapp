<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin - Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2 sm:px-20 bg-white border-b border-gray-200">

                    <div class="mt-3 text-2xl font-black">
                        <p class="text-blue-600">Employee menu</p>

                        <nav class="flex" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                                <li class="inline-flex items-center">
                                    <a href="{{ route('dashboard') }}"
                                        class="inline-flex items-center text-sm font-medium text-gray-700 dark:text-gray-400">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                            </path>
                                        </svg>
                                        Dashboard
                                    </a>
                                </li>

                                <li aria-current="page">
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span
                                            class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Employee</span>
                                    </div>
                                </li>
                                <li aria-current="page">
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span
                                            class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Create
                                            User Employee</span>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="mt-3 text-red-500 text-lg font-bold mb-2">
                        <a href="{{ route('employee.index') }}"><i class="bi bi-arrow-left-circle"></i> Back</a>
                    </div>
                </div>
            </div>
            @if ($errors->any())
                <div class="mt-3 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-2 sm:px-20 bg-white border-b border-gray-200">

                        <div class="mb-5" role="alert">
                            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                There's something wrong
                            </div>
                            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-500">
                                <p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            @endif
            {{-- data table --}}
            <div class="mt-3 bg-[#F9FAFB] overflow-hidden shadow-xl sm:rounded-lg">

                <div class="mx-auto px-2">
                    <form action="{{ route('employee.update', $data->id) }}" method="post" class="w-full">
                        @method('PUT')
                        @csrf
                        <div class="bg-white border shadow-md px-8 pt-6 pb-8 mb-4 flex flex-col h-full">

                            <div>
                                <span class="text-red-500 text-xs italic">
                                    * Please fill out this field. (tanda bintang wajib di isi)
                                </span>
                            </div>

                            <div class="-mx-3 md:flex mb-1">
                                <div class="md:w-1/2 px-3  mb-1 md:mb-0">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="name">
                                        name*
                                    </label>
                                    <input value="{{ old('name') ?? $data->name }}" name="name"
                                        class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"
                                        id="nama_ruang" type="text" placeholder="username">
                                </div>
                                <div class="md:w-1/2 px-3  mb-1 md:mb-0">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="email">
                                        email*
                                    </label>
                                    <input value="{{ old('email') ?? $data->email }}" name="email"
                                        class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"
                                        id="kapasitas" type="email" placeholder="email">
                                </div>
                            </div>

                            <div class="-mx-3 md:flex mb-1">
                                <div class="md:w-full px-3">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="password">
                                        Password*
                                    </label>
                                    <input value="{{ old('password') }}" name="password"
                                        class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"
                                        id="password" type="password" placeholder="password">
                                </div>

                            </div>
                            <div class="-mx-3 md:flex mb-1">
                                <div class="md:w-full px-3">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="password_confirmation">
                                        Password Confirmation*
                                    </label>
                                    <input value="{{ old('password_confirmation') }}" name="password_confirmation"
                                        class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"
                                        id="password_confirmation" type="password" placeholder="password_confirmation">
                                </div>
                                <input type="hidden" name="roles" value="user">
                            </div>

                            <div class="-mx-3 md:flex mt-8">
                                <div class="md:w-full px-3">
                                    <button
                                        class="md:w-full bg-cyan-800 hover:bg-cyan-500 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-400 hover:border-gray-100 rounded-full">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <!--/container-->
            </div>
        </div>
    </div>
    @push('scripts')
    @endpush
</x-app-layout>
