<form action="{{ route('logs') }}">
    <input type="date" name="date" value="{{ $date ? $date->format('Y-m-d') : today()->format('Y-m-d') }}">
    <button type="submit">get</button>
</form>

<a href="{{ url('api/clear-logs') }}" target="_blank">claer logs</a>

@if(empty($data['file']))
<div>
    <h3>no log found</h3>
</div>
@else
<div>
    <h5>Updated on <b>{{ $data['lastModified']->format('Y-m-d h:i a') }}</b></h5>
    <pre>{{ $data['file'] }}</pre>
</div>
@endif
