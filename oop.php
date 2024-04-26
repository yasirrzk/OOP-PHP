<?php

class Buku {
    private $judul;
    private $tahun;
    private $jumlahHalaman;
    private $bahanMaterial;
    private $diskon;

    public function __construct($judul, $tahun, $jumlahHalaman, $bahanMaterial, $diskon) {
        $this->judul = $judul;
        $this->tahun = $tahun;
        $this->jumlahHalaman = $jumlahHalaman;
        $this->bahanMaterial = $bahanMaterial;
        $this->diskon = $diskon;
    }

    public function getJudul() {
        return $this->judul;
    }

    public function getTahun() {
        return $this->tahun;
    }

    public function getJumlahHalaman() {
        return $this->jumlahHalaman;
    }

    public function getBahanMaterial() {
        return $this->bahanMaterial;
    }

    public function getDiskon() {
        return $this->diskon;
    }

    public function setDiskon($diskon) {
        $this->diskon = $diskon;
    }

    public function cekHarga() {
        if ($this->tahun <= 5 && $this->jumlahHalaman <= 100 ) {
            $harga = 300000;
        } elseif ($this->tahun >= 5 && $this->tahun <= 10 && $this->jumlahHalaman <= 100 ) {
            $harga = 50000;
        } elseif ($this->tahun >= 5 && $this->tahun <= 10 && $this->jumlahHalaman >= 500 ) {
            $harga = 250000;
        } elseif ($this->tahun >= 5 && $this->tahun <= 10 && $this->jumlahHalaman >= 100 && $this->jumlahHalaman <=500 ) {
            $harga = 15000;
        } else{
            $harga = 1000;
        }
        $harga -= $harga * $this->diskon/100;
        return $harga;
    }
}

class Komik extends Buku {
    private $isColorful;

    private function __construct($judul, $tahun, $jumlahHalaman, $bahanMaterial, $diskon, $isColorful) {
        parent::__construct($judul, $tahun, $jumlahHalaman, $bahanMaterial, $diskon);
        $this->isColorful = $isColorful;
    }

    public static function createBuku($judul, $tahun, $jumlahHalaman, $bahanMaterial, $diskon, $isColorful) {
        return new Komik($judul, $tahun, $jumlahHalaman, $bahanMaterial, $diskon, $isColorful);
    }

    public function getIsColorful() {
        return $this->isColorful;
    }
}

$buku = new Buku("Calculus", 2024, 1000, "Kertas", 0);
echo "Judul buku : " . $buku->getJudul() . "\n";

$komik = Komik::createBuku("One Piece", 1998, 500, "Kertas", 0, true);
echo "Judul komik : " . $komik->getJudul();
?>