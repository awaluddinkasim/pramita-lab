<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notifikasi Permintaan Pengiriman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #4a76a8;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }

        .content {
            padding: 20px;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 5px 5px;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }

        .info-box {
            background-color: #f9f9f9;
            border-left: 4px solid #4a76a8;
            padding: 15px;
            margin: 15px 0;
        }

        .timestamp {
            font-style: italic;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Permintaan Pengiriman Diterima</h2>
        </div>

        <div class="content">
            <p>Halo {{ $user->nama }},</p>

            <p>Kami ingin memberitahukan bahwa permintaan pengiriman Anda telah diterima oleh petugas.</p>

            <div class="info-box">
                <p><strong>Detail Permintaan:</strong></p>
                <ul>
                    <li>Tujuan Pengiriman: {{ $order->tujuan }}</li>
                    <li>Detail Pengiriman: {{ $order->detail }}</li>
                    <li>Status: Diterima</li>
                </ul>

                <p><strong>Diterima oleh:</strong> {{ $delivery->nama_petugas }}</p>
                <p class="timestamp">
                    <strong>Waktu Penerimaan:</strong> {{ createDateTime($delivery->created_at) }}
                </p>
            </div>
        </div>

        <div class="footer">
            <p>Email ini dibuat secara otomatis, mohon tidak membalas email ini.</p>
        </div>
    </div>
</body>

</html>
