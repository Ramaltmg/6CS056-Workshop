@if($slot->isNotEmpty())
    <div style="padding: 10px; margin-bottom: 10px; color: white; background-color: {{ $type === 'success' ? 'green' : 'red' }};">
        {{ $slot }}
    </div>
@endif
