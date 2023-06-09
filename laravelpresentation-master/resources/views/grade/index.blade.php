<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Grades Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                <a class="mt-4 bg-pink-200 text-black font-bold py-2 px-4 rounded" href="{{ route('add-grade')}}">Add Grades</a>
                    <h6>List of Grades</h6>
                    <table class="border-separate border-spacing-5">
                      <tr>
                        <th>Enrolled Subjects Number</th>
                        <th>Student Number</th>
                        <th>Prelim</th>
                        <th>Midterm</th>
                        <th>Final</th>
                        <th>Remarks</th>
                      </tr>
                    <tbody>
                        @foreach($grades as $gd)
                       <tr>
                        <td>{{$gd->esNo }}</td>
                        <td>{{$gd->sNo }} </td>
                        <td>{{$gd->prelim }}</td>
                        <td>{{$gd->midterm }}</td>
                        <td>{{$gd->final }}</td>
                        <td>{{$gd->remarks}}</td>
                        <td>
                            <a class="mt-4 bg-teal-200 text-black font-bold py-2 px-4 rounded" href= "{{route('grades-show', ['subjno' => $gd->esNo]) }}" >View</a>
                            <a class="mt-4 bg-blue-200 text-black font-bold py-2 px-4 rounded" href= "{{route('grades-edit', ['subjno' => $gd->esNo]) }}" >Edit</a>
                            <form method="POST" action = "{{ route('grades-delete', ['subjno' => $gd->esNo ])  }}" onclick="return confirm('Are you sure you want to delete this record?')">
                           @csrf
                           @method('delete')
                           <button class="mt-4 bg-red-200 text-black font-bold py-2 px-4 rounded" type="submit" >Delete</a>
                        </form>
                        <td>
                       </tr>
                        @endforeach
                </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>