@extends('base')

@section('title', 'Woning Beschrijving')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="card custom-card shadow-lg" style="width: 600px; max-width: 900px;">
        <div class="card-body">
            
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <td><strong>Titel</strong></td>
                        <td>{{ $woning->Titel }}</td>
                    </tr>
                    <tr>
                        <td><strong>Omschrijving</strong></td>
                        <td>{{ $woning->Omschrijving }}</td>
                    </tr>
                    <tr>
                        <td><strong>Oppervlakte</strong></td>
                        <td>{{ $woning->Oppervlakte }} m²</td>
                    </tr>
                    <tr>
                        <td><strong>Prijs Per Week</strong></td>
                        <td>€{{ number_format($woning->PrijsPerWeek, 0, ',', '.') }}</td>
                    </tr>
                    @if($woning->image)
                        <tr>
                            <td><strong>Afbeeldingen</strong></td>
                            <td>
                                @php
                                    $images = json_decode($woning->image); 
                                @endphp

                                @foreach($images as $image)
                                    <img src="{{ asset('storage/' . $image) }}" alt="Afbeelding" width="100" style="margin: 5px;">
                                @endforeach
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td><strong>Afbeeldingen</strong></td>
                            <td>Geen afbeelding beschikbaar</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <a href="/woning" class="btn btn-primary btn-block">Terug naar woningen</a>
        </div>
    </div>
</div>
@endsection
