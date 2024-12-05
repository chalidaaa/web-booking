@extends('layouts.app')
@section('content')
<div class="w-full bg-white p-6 rounded-lg shadow-md">
         @if(session()->has('message'))
            <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-4">
                {{ session('message') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-4">
                {{ session('error') }}
            </div>
        @endif
        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <!-- Delete User Modal -->
    <div id="deleteModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modalTitle">Delete User</h3>
                                <div class="mt-2">
                                    <p>Are you sure you want to delete this user?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">Delete</button>
                        <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm" onclick="closeModal()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
   

    <!-- Add/Edit User Modal -->
    <div id="modalAdd" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Add Booking
                    </h3>
                    <button type="button" data-modal-toggle="modalAdd" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="closeModal()">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form id="bookingForm" method="POST" action="{{ route('bookings.store') }}" class="p-4 md:p-5">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User ID</label>
                            <select name="user_id" id="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                <option value="" disabled selected>Select user</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="customer_phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer Phone</label>
                            <input type="text" name="customer_phone" id="customer_phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type customer phone" required>
                        </div>
                        <div class="col-span-2">
                            <label for="booking_datetime" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Booking DateTime</label>
                            <input type="datetime-local" name="booking_datetime" id="booking_datetime" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                            <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="pending">Pending</option>
                                <option value="confirmed">Confirmed</option>
                                <option value="cancelled">Cancelled</option>
                                <option value="done">Done</option>
                            </select>
                        </div>
                       <div class="col-span-2">
                            <label for="note" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label>
                            <textarea name="note" id="note" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type any notes"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Add new booking
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- <button onclick="openModal('add')" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Add User
    </button> --}}
    <button data-modal-target="modalAdd" data-modal-toggle="modalAdd" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Add Booking
    </button>
    <!-- Table Section -->
   <div class="mt-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">Booking List</h3>
        <div class="mt-2 overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer Phone</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Booking DateTime</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Note</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($bookings as $booking)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $booking->user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $booking->customer_phone }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $booking->booking_datetime }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                 <span 
                                class="@if($booking->status == 'pending') bg-yellow-100 text-yellow-800 
                                        @elseif($booking->status == 'confirmed') bg-green-100 text-green-800 
                                        @elseif($booking->status == 'cancelled') bg-red-100 text-red-800 
                                        @elseif($booking->status == 'done') bg-blue-100 text-blue-800 
                                        @endif
                                        px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full">
                                {{ ucfirst($booking->status) }}
                            </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $booking->note }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button  data-modal-target="modalEdit{{ $booking->id }}" data-modal-toggle="modalEdit{{ $booking->id }}" class="text-indigo-600 hover:text-indigo-900">Edit</button>
                            <button data-modal-target="modalDelete{{ $booking->id }}" data-modal-toggle="modalDelete{{ $booking->id }}" class="text-red-600 hover:text-red-900">Delete</button>
                        </td>
                        <div id="modalEdit{{ $booking->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg p-4 shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Edit Booking
                                        </h3>
                                        <button type="button" data-modal-toggle="modalEdit{{ $booking->id }}" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="closeModal()">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form id="BookingForm" method="POST" action="{{ route('bookings.update', $booking->id) }}" class="p-4 md:p-5">
                                        @csrf
                                        @method('PUT')
                                         <div class="grid gap-4 mb-4 grid-cols-2">
                                            <div class="col-span-2">
                                                <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User ID</label>
                                                <select name="user_id" id="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                                    <option value="{{ $booking->user->id }}"  selected>{{ $booking->user->name }}</option>
                                                    @foreach($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-span-2">
                                                <label for="customer_phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer Phone</label>
                                                <input type="text" value="{{ $booking->customer_phone }}" name="customer_phone" id="customer_phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type customer phone" required>
                                            </div>
                                            <div class="col-span-2">
                                                <label for="booking_datetime" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Booking DateTime</label>
                                                <input type="datetime-local" value="{{ $booking->booking_datetime }}" name="booking_datetime" id="booking_datetime" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                            </div>
                                            <div class="col-span-2 sm:col-span-1">
                                                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                                <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    <option value="{{ $booking->status }}" disabled selected>{{ $booking->status }}</option>
                                                    <option value="pending">Pending</option>
                                                    <option value="confirmed">Confirmed</option>
                                                    <option value="cancelled">Cancelled</option>
                                                    <option value="done">Done</option>
                                                </select>
                                            </div>
                                        <div class="col-span-2">
                                                <label for="note" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label>
                                                <textarea name="note"  id="note" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type any notes">{{ $booking->note }}</textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                            Edit booking
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div id="modalDelete{{ $booking->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modalDelete{{ $booking->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <form id="deleteForm" method="POST" action="{{ route('bookings.destroy', $booking->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah Anda Yakin ingin Menghapus Data Ini?</h3>
                                            <button href data-modal-hide="modalDelete" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                Delete
                                            </button>
                                            <button data-modal-hide="modalDelete" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
<script>
    function openDeleteModal(user) {
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteForm').action = `/users/${user.id}`;
    }
</script>

@endsection