<?php

    function formatRupiah($field, $nominal, $prefix = null)
    {
        // $prefix = $prefix ? $prefix : 'Rp. ';
        // $nominal = $this->attributes[$field];
        // return $prefix . number_format($nominal, 0, ',', '.');
        return "Rp " . number_format($nominal, 2, ',', '.');
    }

?>