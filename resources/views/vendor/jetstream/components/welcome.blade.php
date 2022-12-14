<div class="p-6 sm:px-20 bg-white border-b border-gray-200">

    <div class="mt-8 text-2xl font-black ">
        <p class="text-blue-600"> Welcome to admin dashboard</p>
    </div>

    <div class="mt-6 text-gray-500">
        Manage all resources of the data in application with one touch
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6">
        <div class="flex items-center">
            <i class="bi bi-collection"></i>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="#">Data Ruang Meeting</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                Kelola Data Ruang Meeting
            </div>

            <a href="{{ route('room.index') }}">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                    <div>Klik di sini!</div>

                    <div class="ml-1 text-indigo-500">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="flex items-center">
            <i class="bi bi-file-earmark-person"></i>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="#">Data
                    Employee</a></div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                Kelola semua data karyawan
            </div>

            <a href="#">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                    <div>Klik disini!</div>

                    <div class="ml-1 text-indigo-500">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200">
        <div class="flex items-center">
            <i class="bi bi-receipt-cutoff"></i>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="#">Booking Transaction</a>
            </div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                Kelola data booking ruang meeting dimenu ini.
            </div>
            <a href="{{ route('transaction.index') }}">
                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                    <div>Klik disini!</div>

                    <div class="ml-1 text-indigo-500">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-l">
        <div class="flex items-center">
            <i class="bi bi-app-indicator"></i>
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="#">Apps</a>
            </div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500">
                <a href="{{ route('app.dashboard') }}">
                    <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                        <div>Klik disini!</div>

                        <div class="ml-1 text-indigo-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
