<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notifikasi Order Baru</title>
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

        .info-box {
            background-color: #f9f9f9;
            border-left: 4px solid #28a745;
            padding: 15px;
            margin: 15px 0;
        }

        .new-order-box {
            background-color: #e8f5e8;
            border: 2px solid #28a745;
            border-radius: 5px;
            padding: 15px;
            margin: 15px 0;
        }

        .pending-orders-box {
            background-color: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            margin: 15px 0;
        }

        .timestamp {
            font-style: italic;
            color: #666;
        }

        .order-item {
            border-bottom: 1px solid #eee;
            padding: 10px 0;
            margin-bottom: 10px;
        }

        .order-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .urgent {
            color: #dc3545;
            font-weight: bold;
        }

        .total-count {
            background-color: #17a2b8;
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            display: inline-block;
            font-weight: bold;
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>🚚 Order Baru Masuk!</h2>
        </div>

        <div class="content">
            <p>Halo Tim Pengiriman,</p>

            <p>Ada permintaan pengiriman baru yang masuk dan menunggu untuk diambil oleh petugas.</p>

            <div class="new-order-box">
                <p><strong>📦 Detail Order Baru:</strong></p>
                <ul>
                    <li><strong>Pengirim:</strong> {{ $order->user->nama ?? 'Tidak tersedia' }}</li>
                    <li><strong>Tujuan:</strong> {{ $order->tujuan }}</li>
                    <li><strong>Detail:</strong> {{ $order->detail }}</li>
                    <li><strong>Waktu Submit:</strong> <span
                            class="timestamp">{{ createDateTime($order->created_at) }}</span></li>
                </ul>
            </div>

            <div class="info-box">
                <p class="total-count">Total Order Pending: {{ $pendingOrders }}</p>
                @if ($pendingOrders >= 5)
                    <p class="urgent">⚠️ Perhatian: Ada banyak order yang menunggu! Segera ambil tindakan.</p>
                @endif
            </div>

            <p><strong>Tindakan Selanjutnya:</strong></p>
            <p>Silakan login ke sistem untuk mengambil dan memproses order yang tersedia.</p>

            <p>Terima kasih atas kerja sama Anda!</p>
        </div>

        <div class="footer">
            <p>Email ini dibuat secara otomatis, mohon tidak membalas email ini.</p>
            <p>Sistem Manajemen Pengiriman - {{ date('Y') }}</p>
        </div>
    </div>
</body>

</html>
