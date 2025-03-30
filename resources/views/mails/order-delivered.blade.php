<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengiriman Selesai</title>
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
            background-color: #28a745;
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

        .success-box {
            background-color: #f8fff8;
            border-left: 4px solid #28a745;
            padding: 15px;
            margin: 15px 0;
        }

        .timestamp {
            font-style: italic;
            color: #666;
        }

        .signature {
            border-top: 1px solid #eee;
            margin-top: 20px;
            padding-top: 15px;
        }

        .cta-button {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            margin: 15px 0;
        }

        .rating {
            text-align: center;
            margin: 20px 0;
        }

        .rating a {
            margin: 0 5px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Pengiriman Selesai</h2>
        </div>

        <div class="content">
            <p>Halo {{ $user->nama }},</p>

            <p>Kami dengan senang hati memberitahukan bahwa pengiriman Anda telah berhasil diselesaikan.</p>

            <div class="success-box">
                <p><strong>Detail Pengiriman:</strong></p>
                <ul>
                    <li>Tujuan Pengiriman: {{ $order->tujuan }}</li>
                    <li>Detail Pengiriman: {{ $order->detail }}</li>
                    <li>Tanggal Pengiriman: {{ createDate($order->created_at) }}</li>
                    <li>Status: Selesai</li>
                </ul>

                <p><strong>Petugas Pengirim:</strong> {{ $delivery->nama_petugas }}</p>
                <p class="timestamp">
                    <strong>Selesai Pada:</strong> {{ createDateTime($delivery->waktu_selesai) }}
                </p>
            </div>
        </div>

        <div class="footer">
            <p>Email ini dibuat secara otomatis, mohon tidak membalas email ini.</p>
        </div>
    </div>
</body>

</html>
