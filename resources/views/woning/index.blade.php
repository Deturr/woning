@extends('base')

@section('title', 'Woninglijst')

@section('content')
    <div class="text-center mb-3">
        <a href="/woning/create" class="btn btn-success">Toevoegen Woningen</a>
    </div>
    <div class="content-wrapper">
    <table class="table table-bordered table-striped text-center">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Titel</th>
                <th>Oppervlakte</th>
                <th>Prijs P.W</th>
                <th>Afbeeldingen</th>
                <th>Controls</th>
            </tr>
        </thead>
        <tbody>
            @foreach($woning as $w)
                <tr>
                    <td>{{ $w->id }}</td>
                    <td>{{ $w->Titel }}</td>
                    <td>{{ $w->Oppervlakte }} m²</td>
                    <td>€{{ $w->PrijsPerWeek }}</td>
                    <td>
                            @php
                                $images = json_decode($w->image);
                            @endphp
                            @foreach($images as $image)
                                <img src="{{ asset('storage/' . $image) }}" alt="Afbeelding" width="50" height="50" style="margin: 5px;">
                            @endforeach
                    </td>
                    <td>
                        <a href="/woning/edit/{{ $w->id }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="/woning/show/{{ $w->id }}" class="btn btn-primary btn-sm">Bekijken</a>
                        <form action="/woning/destroy/{{ $w->id }}" method="post" style="display:inline;">
                            @csrf
                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
