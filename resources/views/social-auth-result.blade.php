<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ ucfirst($provider) }} Authorization — Build With Abdallah</title>
    <style>
        body { font-family: system-ui, sans-serif; background: #0f172a; color: #e2e8f0; display: flex; align-items: center; justify-content: center; min-height: 100vh; margin: 0; padding: 24px; box-sizing: border-box; }
        .card { background: #1e293b; border-radius: 16px; padding: 48px; text-align: center; max-width: 520px; box-shadow: 0 25px 50px rgba(0,0,0,0.4); }
        .emoji { font-size: 64px; }
        h1 { font-size: 30px; margin: 8px 0; color: {{ $ok ? '#22c55e' : '#f87171' }}; }
        .provider { color: #64748b; font-size: 13px; text-transform: uppercase; letter-spacing: 0.14em; }
        .title { color: #38bdf8; font-weight: bold; font-size: 22px; margin: 16px 0 4px; }
        .detail { color: #94a3b8; margin: 8px 0; font-size: 16px; word-break: break-word; }
        .footer { color: #64748b; font-size: 14px; margin-top: 28px; }
    </style>
</head>
<body>
    <div class="card">
        <div class="emoji">{{ $ok ? '✅' : '⚠️' }}</div>
        <div class="provider">{{ $provider }}</div>
        <h1>{{ $ok ? 'Account Connected!' : 'Connection Failed' }}</h1>
        <div class="title">{{ $title }}</div>
        @if($detail)
            <div class="detail">{{ $detail }}</div>
        @endif
        <div class="footer">Build With Abdallah — Social OAuth</div>
    </div>
</body>
</html>
