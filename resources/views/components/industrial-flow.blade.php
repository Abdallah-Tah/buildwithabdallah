<div class="industrial-flow" aria-label="A representative device-to-enterprise integration architecture">
    <div class="industrial-flow__rail" aria-hidden="true"><span></span></div>
    @foreach ([
        ['equipment', 'Physical equipment', 'Sensor / gage', 'Measurement device'],
        ['local', 'Local device layer', 'Shop-floor PC · COM4', 'USB / RS-232'],
        ['quality', 'Quality & production', 'Acquisition service', 'InfinityQS ProFicient'],
        ['data', 'Data & enterprise', 'SQL Server · SOAP', 'REST · files · automation'],
        ['application', 'Modern applications', 'Laravel · Python · C#', 'Web · reporting · support'],
    ] as $index => [$key, $label, $primary, $secondary])
        <div class="industrial-flow__node industrial-flow__node--{{ $key }}" style="--flow-index: {{ $index }}">
            <span class="industrial-flow__index">0{{ $index + 1 }}</span>
            <span class="industrial-flow__label">{{ $label }}</span>
            <strong>{{ $primary }}</strong>
            <small>{{ $secondary }}</small>
            @if (! $loop->last)<span class="industrial-flow__signal" aria-hidden="true"></span>@endif
        </div>
    @endforeach
</div>
