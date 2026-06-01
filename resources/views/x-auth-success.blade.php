<!DOCTYPE html>
<html>
<head>
    <title>X Authorization - Build With Abdallah</title>
    <style>
        body { font-family: system-ui, sans-serif; background: #0f172a; color: #e2e8f0; display: flex; align-items: center; justify-content: center; min-height: 100vh; margin: 0; }
        .card { background: #1e293b; border-radius: 16px; padding: 48px; text-align: center; max-width: 500px; box-shadow: 0 25px 50px rgba(0,0,0,0.4); }
        h1 { color: #22c55e; font-size: 32px; margin-bottom: 8px; }
        .emoji { font-size: 64px; }
        .info { color: #94a3b8; margin: 16px 0; font-size: 18px; }
        .user { color: #38bdf8; font-weight: bold; font-size: 22px; }
        .footer { color: #64748b; font-size: 14px; margin-top: 24px; }
    </style>
</head>
<body>
    <div class="card">
        <div class="emoji">✅</div>
        <h1>X Account Connected!</h1>
        <div class="info">Successfully authorized:</div>
        <div class="user">@{{ $screenName }}</div>
        <div class="info">User ID: {{ $userId }}</div>
        <div class="footer">Build With Abdallah — X API Integration</div>
    </div>
</body>
</html>
