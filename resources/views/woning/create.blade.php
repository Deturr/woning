@extends('base')

@section('title', 'Voeg Woning Toe')

@section('content')
<div class="container" style="max-width: 600px; margin: 40px auto;">
<div class="content-wrapper">
    <form action="{{ route('woning.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="Titel">Woning Titel</label>
            <input type="text" class="form-control" name="Titel" required />
        </div>

        <div class="form-group">
            <label for="Omschrijving">Omschrijving</label>
            <textarea class="form-control" name="Omschrijving" required></textarea>
        </div>

        <div class="form-group">
            <label for="Oppervlakte">Oppervlakte</label>
            <input type="number" class="form-control" name="Oppervlakte" required />
        </div>

        <div class="form-group">
            <label for="PrijsPerWeek">Prijs</label>
            <input type="text" class="form-control" name="PrijsPerWeek" required />
        </div>

        <div class="form-group">
            <label for="image">Afbeelding</label>
            <input type="file" class="form-control-file" name="images[]" accept="image/*" multiple />
        </div>

        <button type="submit" class="btn btn-primary btn-block">Toevoegen</button>
    </form>
</div>
</div>
@endsection