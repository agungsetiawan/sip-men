<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Monitoring_model extends CI_Model {

    public function getAll()
    {
        $query = $this->db->query("SELECT penyambungan_sementara.id_pelanggan, pelanggan.nama, pelanggan.alamat, penyambungan_sementara.no_telepon, pelanggan.daya, pelanggan.tarif, penyambungan_sementara.tujuan, penyambungan_sementara.tanggal_permohonan, penyambungan_sementara.tanggal_pasang, penyambungan_sementara.id_kwh_ganti, penyambungan_sementara.stand_awal, penyambungan_sementara.petugas_pasang, pemutusan.petugas_cabut,pemutusan.rpkwh, pemutusan.tanggal_cabut ,pemutusan.stand_akhir, pemutusan.pemakaian_kwh, pemutusan.tagihan, pemutusan.terbilang from penyambungan_sementara LEFT JOIN pemutusan ON (penyambungan_sementara.id=pemutusan.penyambungan_id) INNER JOIN pelanggan ON(penyambungan_sementara.id_pelanggan=pelanggan.id_pelanggan)");
        return $query->result();
    }
}