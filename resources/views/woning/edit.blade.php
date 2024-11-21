@extends('base')

@section('title', 'Woning Updaten')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 50vh;">
<div class="content-wrapper">
    <div class="container" style="width: 800px; margin: 40px auto;">

        <form method="POST" action="/woning/update/{{$woning->id}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="Titel">Woning Titel</label>
                <input type="text" class="form-control" name="Titel" value="{{ $woning->Titel }}" />
            </div>

            <div class="form-group">
                <label for="Omschrijving">Omschrijving</label>
                <input type="text" class="form-control" name="Omschrijving" value="{{ $woning->Omschrijving }}" />
            </div>

            <div class="form-group">
                <label for="Oppervlakte">Oppervlakte</label>
                <input type="number" class="form-control" name="Oppervlakte" value="{{ $woning->Oppervlakte }}" />
            </div>

            <div class="form-group">
                <label for="PrijsPerWeek">Prijs</label>
                <input type="text" class="form-control" name="PrijsPerWeek" value="{{ $woning->PrijsPerWeek }}" />
            </div>

            <div class="form-group">
                <label for="image">Afbeeldingen</label>
                <input type="file" class="form-control-file" name="images[]" accept="image/*" multiple />
            </div>

            <button type="submit" class="btn btn-primary btn-block">Bijwerken</button>
        </form>
    </div>
</div>
</div>
@endsection
