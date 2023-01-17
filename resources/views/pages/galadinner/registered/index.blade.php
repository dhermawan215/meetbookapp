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
                        <p class="text-blue-600">Gala Dinner User Registered Menu</p>

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
                                            class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">User
                                            Registered</span>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="mt-3 text-red-500 text-lg font-bold mb-2">
                        <a href="{{ route('dashboard') }}"><i class="bi bi-arrow-left-circle"></i> Back</a>
                    </div>
                </div>
            </div>

            <div class="mt-3 bg-[#F9FAFB] overflow-hidden shadow-xl sm:rounded-lg">

                <div class="mx-auto px-2">
                    <form action="{{ route('user-registered.store') }}" method="post" class="w-full">
                        @csrf
                        <div class="bg-white border shadow-md px-8 pt-6 pb-8 mb-4 flex flex-col h-full">
                            <div class="-mx-3 md:flex mb-1">
                                <div class="md:w-full px-3">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2"
                                        for="password">
                                        name with company*
                                    </label>
                                    <input name="name"
                                        class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3"
                                        id="name" type="text" placeholder="name">
                                </div>
                            </div>

                            <div class="-mx-3 md:flex mt-8">
                                <div class="md:w-full px-3">
                                    <button
                                        class="md:w-full bg-cyan-800 hover:bg-cyan-500 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-400 hover:border-gray-100 rounded-full">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <!--/container-->
            </div>


            {{-- data table --}}
            <div class="mt-3 bg-[#F9FAFB] overflow-hidden shadow-xl sm:rounded-lg">


                <div class="mx-auto px-2">
                    <!--Card-->
                    <div id='recipients' class="p-8 mt-3 lg:mt-0 rounded shadow bg-white text-left">
                        <table id="example" class="stripe hover"
                            style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th data-priority="2">Name-Company</th>
                                    <th data-priority="6">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @forelse ($data as $row)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>
                                            <div class="flex">
                                                <div class="flex items-center">


                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!--/Card-->
                </div>
                <!--/container-->
            </div>



        </div>
    </div>
    @push('scripts')
        <script>
            const success = '{{ Session::has('success') }}';
            const info = '{{ Session::has('info') }}';
            const danger = '{{ Session::get('danger') }}';
            const msgSuccess = '{{ Session::get('success') }}';
            const msgInfo = '{{ Session::get('info') }}';
            const msgDanger = '{{ Session::get('danger') }}';
            if (success) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: msgSuccess,
                    showConfirmButton: false,
                    timer: 1500
                });
            }
            if (info) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: msgInfo,
                    showConfirmButton: false,
                    timer: 1500
                });
            }
            if (danger) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: msgDanger,
                })
            }
            $(document).ready(function() {
                var table = $('#example').DataTable({
                        responsive: true
                    })
                    .columns.adjust()
                    .responsive.recalc();
            });
            $('.show_confirm').click(function(event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((willDelete) => {
                    if (willDelete.value) {
                        form.submit();
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
