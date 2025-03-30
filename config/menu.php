<?php

return [
  'admin' => [
    [
      'active' => 'dashboard',
      'label' => 'Dashboard',
      'icon' => 'layout-dashboard',
      'route' => 'admin.dashboard',
    ],
    [
      'active' => 'division',
      'label' => 'Manajemen Divisi',
      'icon' => 'network',
      'route' => 'admin.division.index',
    ],
    [
      'active' => 'account',
      'label' => 'Manajemen Akun',
      'icon' => 'user-cog',
      'submenu' => [
        [
          'active' => 'admin',
          'label' => 'Admin',
          'route' => 'admin.account.admin.index',
        ],
        [
          'active' => 'delivery',
          'label' => 'Petugas',
          'route' => 'admin.account.delivery-person.index',
        ],
      ]
    ],
    [
      'active' => 'user',
      'label' => 'Manajemen Pengguna',
      'icon' => 'users',
      'submenu' => [
        [
          'active' => 'pending',
          'label' => 'Pengguna Baru',
          'route' => 'admin.user.pending',
        ],
        [
          'active' => 'verified',
          'label' => 'Pengguna Aktif',
          'route' => 'admin.user.active',
        ],
      ],
    ],
    [
      'active' => 'orders',
      'label' => 'Pengiriman',
      'icon' => 'clipboard-list',
      'route' => 'admin.orders',
    ],
  ],
  'delivery' => [
    [
      'active' => 'dashboard',
      'label' => 'Dashboard',
      'icon' => 'layout-dashboard',
      'route' => 'delivery.dashboard',
    ],
    [
      'active' => 'active-order',
      'label' => 'Pengiriman Aktif',
      'icon' => 'box',
      'route' => 'delivery.active-order',
    ],
    [
      'active' => 'orders',
      'label' => 'Permintaan Pengiriman',
      'icon' => 'clipboard-list',
      'route' => 'delivery.orders',
    ],
    [
      'active' => 'history',
      'label' => 'Riwayat Pengantaran',
      'icon' => 'history',
      'route' => 'delivery.history',
    ],
  ],
  'user' => [
    [
      'active' => 'dashboard',
      'label' => 'Dashboard',
      'icon' => 'layout-dashboard',
      'route' => 'dashboard',
    ],
    [
      'active' => 'new-order',
      'label' => 'Pengiriman Baru',
      'icon' => 'box',
      'route' => 'new-order',
    ],
    [
      'active' => 'orders',
      'label' => 'Riwayat Pengiriman',
      'icon' => 'clipboard-list',
      'route' => 'orders',
    ]
  ],
];
