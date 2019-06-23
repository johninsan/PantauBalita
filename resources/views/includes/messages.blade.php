@if (count($errors) > 0) @foreach ($errors->all() as $error)
<p class="red-text text-darken-2">{{ $error }}</p>
@endforeach @endif @if (session()->has('message'))
<p class="green-text text-accent-3">{{ session('message') }}</p>
@endif