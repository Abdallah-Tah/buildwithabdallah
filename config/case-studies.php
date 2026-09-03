<?php

return [
    'legacy-manufacturing-modernization' => [
        'number' => '01',
        'title' => 'Legacy Manufacturing Modernization',
        'category' => 'Legacy modernization · Manufacturing systems',
        'summary' => 'An incremental approach to moving critical desktop manufacturing workflows toward a maintainable modern application.',
        'challenge' => [
            'Critical operational workflows relied on aging desktop applications and processing rules accumulated over time.',
            'The modernization path needed to respect validated business behavior while reducing dependence on fragile interfaces and difficult-to-maintain components.',
        ],
        'engineering' => [
            'Analyze existing workflows and business rules before selecting replacement boundaries.',
            'Trace interactions between VB / VB.NET applications, SQL Server data and surrounding operational processes.',
            'Separate reusable business logic from desktop-only presentation and manual execution.',
            'Move appropriate workflows toward Laravel-based browser applications and documented services.',
            'Plan incremental migration and validation rather than requiring an immediate full-system replacement.',
        ],
        'focus' => ['VB / VB.NET', 'Laravel / PHP', 'SQL Server', 'Business-rule analysis', 'Incremental migration', 'Technical documentation'],
        'result' => 'A modernization approach centered on maintainability, controlled transition and preservation of proven operational logic. Specific systems, organizations and performance details remain confidential.',
    ],
    'enterprise-soap-integration' => [
        'number' => '02',
        'title' => 'Enterprise / SOAP Integration',
        'category' => 'Enterprise integration · Production support',
        'summary' => 'Integration engineering across enterprise services, databases and applications where REST was only one part of the environment.',
        'challenge' => [
            'Operational workflows depended on a mix of SOAP services, REST endpoints, SQL Server data and established enterprise processing.',
            'Failures could originate in application code, authentication, XML payloads, service behavior, database logic or deployment configuration.',
        ],
        'engineering' => [
            'Work with SOAP contracts, XML payloads, REST services and JSON transformations.',
            'Connect service operations to SQL Server queries, stored procedures and database workflows.',
            'Implement validation, error handling, authentication and traceable processing boundaries.',
            'Investigate production failures across application, integration and database layers.',
            'Document integration assumptions and corrective changes for continued support.',
        ],
        'focus' => ['SOAP', 'REST', 'XML / JSON', 'SQL Server', 'Stored procedures', 'Authentication', 'Root-cause analysis'],
        'result' => 'More maintainable integration boundaries and clearer production troubleshooting paths. This summary intentionally excludes proprietary service contracts, data structures and organizational details.',
    ],
    'quality-device-integration' => [
        'number' => '03',
        'title' => 'Quality & Device Integration',
        'category' => 'Quality systems · Industrial connectivity',
        'summary' => 'Connecting measurement equipment and local acquisition workflows with quality data, databases and enterprise applications.',
        'challenge' => [
            'Measurement equipment communicated through interfaces available on shop-floor workstations, while quality and business applications operated across separate system layers.',
            'The design needed to respect the physical device boundary: a remote server cannot directly access a COM port on another machine.',
        ],
        'engineering' => [
            'Evaluate protocol documentation, operating-system constraints, hardware interfaces and network topology.',
            'Work with RS-232 / serial communication, COM ports, TCP/IP devices and local acquisition processes.',
            'Integrate measurement-data workflows with InfinityQS ProFicient and SQL Server.',
            'Consider local service bridges, existing acquisition systems, serial-to-Ethernet gateways or browser Web Serial where appropriate.',
            'Parse, normalize and move device data toward quality, reporting and automation workflows.',
        ],
        'focus' => ['InfinityQS ProFicient', 'RS-232 / COM', 'TCP/IP', 'Local device services', 'SQL Server', 'Data acquisition', 'Automation'],
        'result' => 'A technically accurate device-to-enterprise integration approach selected around the actual deployment environment. Hardware compatibility always depends on manufacturer specifications and available protocol documentation.',
    ],
];
