<?php

if (! function_exists('format_bulan')) {
    function format_bulan($bulan)
    {
        // Contoh format bulan, sesuaikan dengan kebutuhan Anda
        $nama_bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        return $nama_bulan[$bulan] ?? '';
    }
}
