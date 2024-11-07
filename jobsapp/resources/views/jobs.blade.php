<x-layout>

    <x-slot:heading>
        Jobs Page
    </x-slot:heading>

    <h1>Jobs Page</h1>

    <ul>
        @foreach($jobs as $job)
            <li>
                <a href="/jobs/{{ $job['id'] }}" class="text-blue-500 hover:underline">
                    <div class="font-bold text-blue-500 text sm">{{ $job->employer->name }}</div>
                    <div>
                        <strong>{{$job['title']}}</strong> : pays {{ $job['salary'] }} per year
                    </div>
                </a>
            </li>
        @endforeach

        <div>
            {{ $jobs->links() }}
        </div>


    </ul>
</x-layout>
