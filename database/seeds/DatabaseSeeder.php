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
            array('maP' => 'P101', 'tenP' => 'P101', 'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P102', 'tenP' => 'P102', 'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P103', 'tenP' => 'P103', 'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P104', 'tenP' => 'P104', 'loaiP' => '
Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P105', 'tenP' => 'P105', 'loaiP' => '
Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P106', 'tenP' => 'P106', 'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P201', 'tenP' => 'P201', 'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P202', 'tenP' => 'P202', 'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P203', 'tenP' => 'P203', 'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P204', 'tenP' => 'P204', 'loaiP' => '
Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P205', 'tenP' => 'P205', 'loaiP' => '
Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P206', 'tenP' => 'P206', 'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P301', 'tenP' => 'P301', 'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P302', 'tenP' => 'P302', 'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P303', 'tenP' => 'P303', 'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P304', 'tenP' => 'P304', 'loaiP' => '
Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P305', 'tenP' => 'P305', 'loaiP' => '
Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P306', 'tenP' => 'P306', 'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P401', 'tenP' => 'P401', 'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P402', 'tenP' => 'P402', 'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P403', 'tenP' => 'P403', 'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P404', 'tenP' => 'P404', 'loaiP' => '
Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P405', 'tenP' => 'P405', 'loaiP' => '
Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P406', 'tenP' => 'P406', 'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P501', 'tenP' => 'P501', 'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P502', 'tenP' => 'P502', 'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P503', 'tenP' => 'P503', 'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P504', 'tenP' => 'P504', 'loaiP' => '
Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P505', 'tenP' => 'P505', 'loaiP' => '
Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P506', 'tenP' => 'P506', 'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P601', 'tenP' => 'P601', 'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P602', 'tenP' => 'P602', 'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P603', 'tenP' => 'P603', 'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P604', 'tenP' => 'P604', 'loaiP' => '
Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P605', 'tenP' => 'P605', 'loaiP' => '
Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P606', 'tenP' => 'P606', 'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P701', 'tenP' => 'P701', 'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P702', 'tenP' => 'P702', 'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P703', 'tenP' => 'P703', 'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P704', 'tenP' => 'P704', 'loaiP' => '
Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P705', 'tenP' => 'P705', 'loaiP' => '
Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P706', 'tenP' => 'P706', 'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('maP' => 'P801', 'tenP' => 'P801', 'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P802', 'tenP' => 'P802', 'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P803', 'tenP' => 'P803', 'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
            array('maP' => 'P804', 'tenP' => 'P804', 'loaiP' => '
Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('maP' => 'P805', 'tenP' => 'P805', 'loaiP' => '
Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '0', 'maDV' => '', 'maNV' => 2, 'trong' => 0),
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
            array('tang' => 1, 'maP' => 'P101', 'tenP' => 'P101', 'songuoi'=>2 ,'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('tang' => 1, 'maP' => 'P102', 'tenP' => 'P102', 'songuoi'=>2 ,'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('tang' => 1, 'maP' => 'P103', 'tenP' => 'P103', 'songuoi'=>2 ,'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('tang' => 1, 'maP' => 'P104', 'tenP' => 'P104', 'songuoi'=>3 ,'loaiP' => 'Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('tang' => 1, 'maP' => 'P105', 'tenP' => 'P105', 'songuoi'=>3 ,'loaiP' => 'Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('tang' => 1, 'maP' => 'P106', 'tenP' => 'P106', 'songuoi'=>3 ,'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('tang' => 2, 'maP' => 'P201', 'tenP' => 'P201', 'songuoi'=>2 ,'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('tang' => 2, 'maP' => 'P202', 'tenP' => 'P202', 'songuoi'=>2 ,'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('tang' => 2, 'maP' => 'P203', 'tenP' => 'P203', 'songuoi'=>2 ,'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('tang' => 2, 'maP' => 'P204', 'tenP' => 'P204', 'songuoi'=>3 ,'loaiP' => 'Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('tang' => 2, 'maP' => 'P205', 'tenP' => 'P205', 'songuoi'=>3 ,'loaiP' => 'Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('tang' => 2, 'maP' => 'P206', 'tenP' => 'P206', 'songuoi'=>3 ,'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('tang' => 3, 'maP' => 'P301', 'tenP' => 'P301', 'songuoi'=>2 ,'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('tang' => 3, 'maP' => 'P302', 'tenP' => 'P302', 'songuoi'=>2,'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('tang' => 3, 'maP' => 'P303', 'tenP' => 'P303', 'songuoi'=>2,'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('tang' => 3, 'maP' => 'P304', 'tenP' => 'P304', 'songuoi'=>3 ,'loaiP' => 'Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('tang' => 3, 'maP' => 'P305', 'tenP' => 'P305', 'songuoi'=>3 ,'loaiP' => 'Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('tang' => 3, 'maP' => 'P306', 'tenP' => 'P306', 'songuoi'=>3 ,'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('tang' => 4, 'maP' => 'P401', 'tenP' => 'P401', 'songuoi'=>2 ,'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('tang' => 4, 'maP' => 'P402', 'tenP' => 'P402', 'songuoi'=>2 ,'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('tang' => 4, 'maP' => 'P403', 'tenP' => 'P403', 'songuoi'=>2 ,'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('tang' => 4, 'maP' => 'P404', 'tenP' => 'P404', 'songuoi'=>3 ,'loaiP' => 'Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('tang' => 4, 'maP' => 'P405', 'tenP' => 'P405', 'songuoi'=>3 ,'loaiP' => 'Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('tang' => 4, 'maP' => 'P406', 'tenP' => 'P406', 'songuoi'=>3 ,'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('tang' => 5, 'maP' => 'P501', 'tenP' => 'P501', 'songuoi'=>2 ,'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('tang' => 5, 'maP' => 'P502', 'tenP' => 'P502', 'songuoi'=>2 ,'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('tang' => 5, 'maP' => 'P503', 'tenP' => 'P503', 'songuoi'=>2 ,'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('tang' => 5, 'maP' => 'P504', 'tenP' => 'P504', 'songuoi'=>3 ,'loaiP' => 'Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('tang' => 5, 'maP' => 'P505', 'tenP' => 'P505', 'songuoi'=>3 ,'loaiP' => 'Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('tang' => 5, 'maP' => 'P506', 'tenP' => 'P506', 'songuoi'=>3 ,'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('tang' => 6, 'maP' => 'P601', 'tenP' => 'P601', 'songuoi'=>2 ,'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('tang' => 6, 'maP' => 'P602', 'tenP' => 'P602', 'songuoi'=>2 ,'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('tang' => 6, 'maP' => 'P603', 'tenP' => 'P603', 'songuoi'=>2 ,'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('tang' => 6, 'maP' => 'P604', 'tenP' => 'P604', 'songuoi'=>3 ,'loaiP' => 'Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('tang' => 6, 'maP' => 'P605', 'tenP' => 'P605', 'songuoi'=>3 ,'loaiP' => 'Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('tang' => 6, 'maP' => 'P606', 'tenP' => 'P606', 'songuoi'=>3 ,'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('tang' => 7, 'maP' => 'P701', 'tenP' => 'P701', 'songuoi'=>2 ,'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('tang' => 7, 'maP' => 'P702', 'tenP' => 'P702', 'songuoi'=>2 ,'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('tang' => 7, 'maP' => 'P703', 'tenP' => 'P703', 'songuoi'=>2 ,'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('tang' => 7, 'maP' => 'P704', 'tenP' => 'P704', 'songuoi'=>3 ,'loaiP' => 'Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('tang' => 7, 'maP' => 'P705', 'tenP' => 'P705', 'songuoi'=>3 ,'loaiP' => 'Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('tang' => 7, 'maP' => 'P706', 'tenP' => 'P706', 'songuoi'=>3 ,'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('tang' => 8, 'maP' => 'P801', 'tenP' => 'P801', 'songuoi'=>2 ,'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('tang' => 8, 'maP' => 'P802', 'tenP' => 'P802', 'songuoi'=>2 ,'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('tang' => 8, 'maP' => 'P803', 'tenP' => 'P803', 'songuoi'=>2 ,'loaiP' => 'Popularly', 'hour' => 60000, 'day' => 150000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('tang' => 8, 'maP' => 'P804', 'tenP' => 'P804', 'songuoi'=>3 ,'loaiP' => 'Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('tang' => 8, 'maP' => 'P805', 'tenP' => 'P805', 'songuoi'=>3 ,'loaiP' => 'Trader', 'hour' => 80000, 'day' => 250000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('tang' => 8, 'maP' => 'P806', 'tenP' => 'P806', 'songuoi'=>3 ,'loaiP' => 'Vip', 'hour' => 120000, 'day' => 450000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('tang' => 9, 'maP' => 'P901', 'tenP' => 'P901', 'songuoi'=>4 ,'loaiP' => 'Royal', 'hour' => 500000, 'day' => 2000000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('tang' => 9, 'maP' => 'P902', 'tenP' => 'P902', 'songuoi'=>4 ,'loaiP' => 'Royal', 'hour' => 500000, 'day' => 2000000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('tang' => 9, 'maP' => 'P903', 'tenP' => 'P903', 'songuoi'=>4 ,'loaiP' => 'Royal', 'hour' => 500000, 'day' => 2000000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('tang' => 9, 'maP' => 'P904', 'tenP' => 'P904', 'songuoi'=>4 ,'loaiP' => 'Royal', 'hour' => 500000, 'day' => 2000000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 1, 'trong' => 1),
            array('tang' => 9, 'maP' => 'P905', 'tenP' => 'P905', 'songuoi'=>4 ,'loaiP' => 'Royal', 'hour' => 500000, 'day' => 2000000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1),
            array('tang' => 9, 'maP' => 'P906', 'tenP' => 'P906', 'songuoi'=>4 ,'loaiP' => 'Royal', 'hour' => 500000, 'day' => 2000000, 'tinhtrang' => '1', 'maDV' => '', 'maNV' => 2, 'trong' => 1)
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
