@if (count($errors) > 0) @foreach ($errors->all() as $error)
<div class="card-panel red darken-3">
    <span class="grey-text text-lighten-2">{{ $error }}</span>
</div>
@endforeach @endif @if (session()->has('message'))
<div class="card-panel teal accent-3">
    <span class="grey-text text-darken-4">{{ session('message') }}</span>
</div>
@endif