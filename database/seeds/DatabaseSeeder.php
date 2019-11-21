<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('Phong_2TableSeeder');
        $this->call('DichVuTableSeeder');
        $this->call('UserTableSeeder');
    }
}

class Phong_1TableSeeder extends Seeder
{
    public function run()
    {
        DB::table('phong')->insert([
            array('maP' => 'P101', 'tenP' => 'P101', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P102', 'tenP' => 'P102', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P103', 'tenP' => 'P103', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P104', 'tenP' => 'P104', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P105', 'tenP' => 'P105', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P106', 'tenP' => 'P106', 'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P201', 'tenP' => 'P201', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P202', 'tenP' => 'P202', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P203', 'tenP' => 'P203', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P204', 'tenP' => 'P204', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P205', 'tenP' => 'P205', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P206', 'tenP' => 'P206', 'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P301', 'tenP' => 'P301', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P302', 'tenP' => 'P302', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P303', 'tenP' => 'P303', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P304', 'tenP' => 'P304', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P305', 'tenP' => 'P305', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P306', 'tenP' => 'P306', 'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P401', 'tenP' => 'P401', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P402', 'tenP' => 'P402', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P403', 'tenP' => 'P403', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P404', 'tenP' => 'P404', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P405', 'tenP' => 'P405', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P406', 'tenP' => 'P406', 'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P501', 'tenP' => 'P501', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P502', 'tenP' => 'P502', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P503', 'tenP' => 'P503', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P504', 'tenP' => 'P504', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P505', 'tenP' => 'P505', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P506', 'tenP' => 'P506', 'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P601', 'tenP' => 'P601', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P602', 'tenP' => 'P602', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P603', 'tenP' => 'P603', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P604', 'tenP' => 'P604', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P605', 'tenP' => 'P605', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P606', 'tenP' => 'P606', 'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P701', 'tenP' => 'P701', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P702', 'tenP' => 'P702', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P703', 'tenP' => 'P703', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P704', 'tenP' => 'P704', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P705', 'tenP' => 'P705', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P706', 'tenP' => 'P706', 'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P801', 'tenP' => 'P801', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P802', 'tenP' => 'P802', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P803', 'tenP' => 'P803', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P804', 'tenP' => 'P804', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P805', 'tenP' => 'P805', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P806', 'tenP' => 'P806', 'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P901', 'tenP' => 'P901', 'loaiP' => 'Royal', 'hour' => 500000, 'day' => 2000000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P902', 'tenP' => 'P902', 'loaiP' => 'Royal', 'hour' => 500000, 'day' => 2000000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P903', 'tenP' => 'P903', 'loaiP' => 'Royal', 'hour' => 500000, 'day' => 2000000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P904', 'tenP' => 'P904', 'loaiP' => 'Royal', 'hour' => 500000, 'day' => 2000000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P905', 'tenP' => 'P905', 'loaiP' => 'Royal', 'hour' => 500000, 'day' => 2000000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P906', 'tenP' => 'P906', 'loaiP' => 'Royal', 'hour' => 500000, 'day' => 2000000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1)
        ]);
    }
}

class Phong_2TableSeeder extends Seeder
{
    public function run()
    {
        DB::table('phong')->insert([
            array('maP' => 'P101', 'tenP' => 'P101', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P102', 'tenP' => 'P102', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P103', 'tenP' => 'P103', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P104', 'tenP' => 'P104', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P105', 'tenP' => 'P105', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P106', 'tenP' => 'P106', 'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P201', 'tenP' => 'P201', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P202', 'tenP' => 'P202', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P203', 'tenP' => 'P203', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P204', 'tenP' => 'P204', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P205', 'tenP' => 'P205', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P206', 'tenP' => 'P206', 'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P301', 'tenP' => 'P301', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P302', 'tenP' => 'P302', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P303', 'tenP' => 'P303', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P304', 'tenP' => 'P304', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P305', 'tenP' => 'P305', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P306', 'tenP' => 'P306', 'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P401', 'tenP' => 'P401', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P402', 'tenP' => 'P402', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P403', 'tenP' => 'P403', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P404', 'tenP' => 'P404', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P405', 'tenP' => 'P405', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P406', 'tenP' => 'P406', 'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P501', 'tenP' => 'P501', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P502', 'tenP' => 'P502', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P503', 'tenP' => 'P503', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P504', 'tenP' => 'P504', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P505', 'tenP' => 'P505', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P506', 'tenP' => 'P506', 'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P601', 'tenP' => 'P601', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P602', 'tenP' => 'P602', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P603', 'tenP' => 'P603', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P604', 'tenP' => 'P604', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P605', 'tenP' => 'P605', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P606', 'tenP' => 'P606', 'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P701', 'tenP' => 'P701', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P702', 'tenP' => 'P702', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P703', 'tenP' => 'P703', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P704', 'tenP' => 'P704', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P705', 'tenP' => 'P705', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P706', 'tenP' => 'P706', 'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P801', 'tenP' => 'P801', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P802', 'tenP' => 'P802', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P803', 'tenP' => 'P803', 'loaiP' => 'binhdan', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P804', 'tenP' => 'P804', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P805', 'tenP' => 'P805', 'loaiP' => 'thuonggia', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P806', 'tenP' => 'P806', 'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P901', 'tenP' => 'P901', 'loaiP' => 'Royal', 'hour' => 500000, 'day' => 2000000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P902', 'tenP' => 'P902', 'loaiP' => 'Royal', 'hour' => 500000, 'day' => 2000000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P903', 'tenP' => 'P903', 'loaiP' => 'Royal', 'hour' => 500000, 'day' => 2000000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P904', 'tenP' => 'P904', 'loaiP' => 'Royal', 'hour' => 500000, 'day' => 2000000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P905', 'tenP' => 'P905', 'loaiP' => 'Royal', 'hour' => 500000, 'day' => 2000000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P906', 'tenP' => 'P906', 'loaiP' => 'Royal', 'hour' => 500000, 'day' => 2000000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1)
        ]);
    }
}




class DichVuTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cacloaidichvu')->insert([
            array('tenDV' => 'nuocsuoi', 'giaDV' => 5000, 'loai' => 'Chai'),
            array('tenDV' => 'coca', 'giaDV' => 12000, 'loai' => 'Lon'),
            array('tenDV' => 'pepsi', 'giaDV' => 12000, 'loai' => 'Lon'),
            array('tenDV' => 'bohuc', 'giaDV' => 15000, 'loai' => 'Lon'),
            array('tenDV' => 'biasaigon', 'giaDV' => 15000, 'loai' => 'Lon'),
            array('tenDV' => 'biaheineken', 'giaDV' => 17000, 'loai' => 'Lon'),
            array('tenDV' => 'biacorona', 'giaDV' => 42000, 'loai' => 'Chai'),
            array('tenDV' => 'craven', 'giaDV' => 35000, 'loai' => 'Goi'),
            array('tenDV' => 'baso', 'giaDV' => 35000, 'loai' => 'Goi'),
            array('tenDV' => 'anuong', 'giaDV' => 100000, 'loai' => 'Lan'),
            array('tenDV' => 'combo1', 'giaDV' => 200000, 'loai' => 'Ngay'),
            array('tenDV' => 'combo2', 'giaDV' => 300000, 'loai' => 'Ngay'),
            array('tenDV' => 'combo3', 'giaDV' => 400000, 'loai' => 'Ngay'),
            array('tenDV' => 'combo4', 'giaDV' => 500000, 'loai' => 'Ngay'),
        ]);
    }
}


class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            array('name' => 'PhamTien', 'phone' => 962466120, 'email' => 'pvvtien.18it2@sict.udn.vn', 'password' => Hash::make('tien2000'), 'admin' => 1),
            array('name' => 'VuAn', 'phone' => 1276959996, 'email' => 'vdan.18it2@sict.udn.vn', 'password' => Hash::make('tien2000'), 'admin' => 0),
        ]);
    }
}
