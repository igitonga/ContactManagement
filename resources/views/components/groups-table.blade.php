@props(['groups'])
<div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-12 mt-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-md text-blue-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    No. Of Contacts
                </th>
                <th scope="col" class="px-6 py-3">
                    Date Created
                </th>
                <th scope="col" class="px-6 py-3">
                    
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($groups as $group)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $group->name }}
                    </th>
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $group->contacts_count }}
                    </th>
                    <td class="px-6 py-4">
                        {{ date('d-m-Y', strtotime($group->created_at)) }}
                    </td>
                    <td class="flex justify-between px-6 py-4 text-right">
                        <a href="{{ url('group/details/' . $group->id) }}"
                            class="font-medium text-green-600 dark:text-blue-500 hover:underline">Edit</a>
                        <a href="{{ url('group/delete/' . $group->id) }}"
                            class="font-medium text-red-600 dark:text-blue-500 hover:underline">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>