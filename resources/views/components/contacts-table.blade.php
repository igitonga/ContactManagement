@props(['contacts'])
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-12 mt-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-md text-blue-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Phone Number
                </th>
                <th scope="col" class="px-6 py-3">
                    Group
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Date Added
                </th>
                <th scope="col" class="px-6 py-3">
                    
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $contact->first_name . ' ' . $contact->last_name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $contact->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $contact->phone_number }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $contact->group !== null ? $contact->group->name : 'N/A' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $contact->status }}
                    </td>
                    <td class="px-6 py-4">
                        {{ date('d-m-Y', strtotime($contact->created_at)) }}
                    </td>
                    <td class="flex justify-between px-6 py-4 text-right">
                        <a href="#" data-modal-target="edit-contact-modal" data-modal-toggle="edit-contact-modal"
                            class="font-medium text-green-600 dark:text-blue-500 hover:underline">Edit</a>
                        <a href="{{ url('delete/' . $contact->id) }}"
                            class="font-medium text-red-600 dark:text-blue-500 hover:underline">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>