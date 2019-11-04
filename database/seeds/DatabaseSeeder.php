<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('PhongTableSeeder');

    }
}

class PhongTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('phong')->insert([
            array('maP' => 'P101', 'tenP' => 'P101', 'loaiP' => 'binhdan', 'giaP/hour' => 60000, 'giaP/day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P102', 'tenP' => 'P102', 'loaiP' => 'binhdan', 'giaP/hour' => 60000, 'giaP/day' => 150000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P103', 'tenP' => 'P103', 'loaiP' => 'binhdan', 'giaP/hour' => 60000, 'giaP/day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P104', 'tenP' => 'P104', 'loaiP' => 'thuonggia', 'giaP/hour' => 80000, 'giaP/day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P105', 'tenP' => 'P105', 'loaiP' => 'thuonggia', 'giaP/hour' => 80000, 'giaP/day' => 250000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P106', 'tenP' => 'P106', 'loaiP' => 'Vip', 'giaP/hour' => 120000, 'giaP/day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P201', 'tenP' => 'P201', 'loaiP' => 'binhdan', 'giaP/hour' => 60000, 'giaP/day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P202', 'tenP' => 'P202', 'loaiP' => 'binhdan', 'giaP/hour' => 60000, 'giaP/day' => 150000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P203', 'tenP' => 'P203', 'loaiP' => 'binhdan', 'giaP/hour' => 60000, 'giaP/day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P204', 'tenP' => 'P204', 'loaiP' => 'thuonggia', 'giaP/hour' => 80000, 'giaP/day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P205', 'tenP' => 'P205', 'loaiP' => 'thuonggia', 'giaP/hour' => 80000, 'giaP/day' => 250000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P206', 'tenP' => 'P206', 'loaiP' => 'Vip', 'giaP/hour' => 120000, 'giaP/day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P301', 'tenP' => 'P301', 'loaiP' => 'binhdan', 'giaP/hour' => 60000, 'giaP/day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P302', 'tenP' => 'P302', 'loaiP' => 'binhdan', 'giaP/hour' => 60000, 'giaP/day' => 150000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P303', 'tenP' => 'P303', 'loaiP' => 'binhdan', 'giaP/hour' => 60000, 'giaP/day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P304', 'tenP' => 'P304', 'loaiP' => 'thuonggia', 'giaP/hour' => 80000, 'giaP/day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P305', 'tenP' => 'P305', 'loaiP' => 'thuonggia', 'giaP/hour' => 80000, 'giaP/day' => 250000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P306', 'tenP' => 'P306', 'loaiP' => 'Vip', 'giaP/hour' => 120000, 'giaP/day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P401', 'tenP' => 'P401', 'loaiP' => 'binhdan', 'giaP/hour' => 60000, 'giaP/day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P402', 'tenP' => 'P402', 'loaiP' => 'binhdan', 'giaP/hour' => 60000, 'giaP/day' => 150000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P403', 'tenP' => 'P403', 'loaiP' => 'binhdan', 'giaP/hour' => 60000, 'giaP/day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P404', 'tenP' => 'P404', 'loaiP' => 'thuonggia', 'giaP/hour' => 80000, 'giaP/day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P405', 'tenP' => 'P405', 'loaiP' => 'thuonggia', 'giaP/hour' => 80000, 'giaP/day' => 250000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P406', 'tenP' => 'P406', 'loaiP' => 'Vip', 'giaP/hour' => 120000, 'giaP/day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P501', 'tenP' => 'P501', 'loaiP' => 'binhdan', 'giaP/hour' => 60000, 'giaP/day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P502', 'tenP' => 'P502', 'loaiP' => 'binhdan', 'giaP/hour' => 60000, 'giaP/day' => 150000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P503', 'tenP' => 'P503', 'loaiP' => 'binhdan', 'giaP/hour' => 60000, 'giaP/day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P504', 'tenP' => 'P504', 'loaiP' => 'thuonggia', 'giaP/hour' => 80000, 'giaP/day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P505', 'tenP' => 'P505', 'loaiP' => 'thuonggia', 'giaP/hour' => 80000, 'giaP/day' => 250000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P506', 'tenP' => 'P506', 'loaiP' => 'Vip', 'giaP/hour' => 120000, 'giaP/day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P601', 'tenP' => 'P601', 'loaiP' => 'binhdan', 'giaP/hour' => 60000, 'giaP/day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P602', 'tenP' => 'P602', 'loaiP' => 'binhdan', 'giaP/hour' => 60000, 'giaP/day' => 150000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P603', 'tenP' => 'P603', 'loaiP' => 'binhdan', 'giaP/hour' => 60000, 'giaP/day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P604', 'tenP' => 'P604', 'loaiP' => 'thuonggia', 'giaP/hour' => 80000, 'giaP/day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P605', 'tenP' => 'P605', 'loaiP' => 'thuonggia', 'giaP/hour' => 80000, 'giaP/day' => 250000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P606', 'tenP' => 'P606', 'loaiP' => 'Vip', 'giaP/hour' => 120000, 'giaP/day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P701', 'tenP' => 'P701', 'loaiP' => 'binhdan', 'giaP/hour' => 60000, 'giaP/day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P702', 'tenP' => 'P702', 'loaiP' => 'binhdan', 'giaP/hour' => 60000, 'giaP/day' => 150000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P703', 'tenP' => 'P703', 'loaiP' => 'binhdan', 'giaP/hour' => 60000, 'giaP/day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P704', 'tenP' => 'P704', 'loaiP' => 'thuonggia', 'giaP/hour' => 80000, 'giaP/day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P705', 'tenP' => 'P705', 'loaiP' => 'thuonggia', 'giaP/hour' => 80000, 'giaP/day' => 250000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P706', 'tenP' => 'P706', 'loaiP' => 'Vip', 'giaP/hour' => 120000, 'giaP/day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P801', 'tenP' => 'P801', 'loaiP' => 'binhdan', 'giaP/hour' => 60000, 'giaP/day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P802', 'tenP' => 'P802', 'loaiP' => 'binhdan', 'giaP/hour' => 60000, 'giaP/day' => 150000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P803', 'tenP' => 'P803', 'loaiP' => 'binhdan', 'giaP/hour' => 60000, 'giaP/day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P804', 'tenP' => 'P804', 'loaiP' => 'thuonggia', 'giaP/hour' => 80000, 'giaP/day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P805', 'tenP' => 'P805', 'loaiP' => 'thuonggia', 'giaP/hour' => 80000, 'giaP/day' => 250000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P806', 'tenP' => 'P806', 'loaiP' => 'Vip', 'giaP/hour' => 120000, 'giaP/day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P901', 'tenP' => 'P901', 'loaiP' => 'Royal', 'giaP/hour' => 500000, 'giaP/day' => 2000000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P902', 'tenP' => 'P902', 'loaiP' => 'Royal', 'giaP/hour' => 500000, 'giaP/day' => 2000000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P903', 'tenP' => 'P903', 'loaiP' => 'Royal', 'giaP/hour' => 500000, 'giaP/day' => 2000000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P904', 'tenP' => 'P904', 'loaiP' => 'Royal', 'giaP/hour' => 500000, 'giaP/day' => 2000000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P905', 'tenP' => 'P905', 'loaiP' => 'Royal', 'giaP/hour' => 500000, 'giaP/day' => 2000000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P906', 'tenP' => 'P906', 'loaiP' => 'Royal', 'giaP/hour' => 500000, 'giaP/day' => 2000000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1)
        ]);
    }

}
