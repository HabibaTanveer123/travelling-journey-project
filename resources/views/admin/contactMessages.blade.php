<x-web-layout>
<div class="bg-image">

    <div class="container mt-5">
        <h2 class="text-center mb-4">Contact Messages</h2>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Message</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->message }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</x-web-layout>
