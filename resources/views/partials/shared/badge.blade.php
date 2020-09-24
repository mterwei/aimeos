@if(isset($state) && $state && isset($body))
<div class="badge badge--{{ $state }}">
    {{ $body }}
</div>
@endif
