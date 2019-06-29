@if (count($errors) > 0) @foreach ($errors->all() as $error)
<div class="card-panel">
    <span class="red-text text-darken-2">{{ $error }}</span>
</div>
@endforeach @endif @if (session()->has('message'))
<div class="card-panel">
    <span class="green-text text-accent-3">{{ session('message') }}</span>
</div>
@endif