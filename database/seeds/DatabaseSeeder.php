<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('phong')->insert([
            ['maP'=>'P101','tenP'=>'P101','loaiP'=>'Bình dân','giaP/hour'=>60000,'giaP/day'=>150000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>1,'trong'=>1],
            ['maP'=>'P102','tenP'=>'P102','loaiP'=>'Bình dân','giaP/hour'=>60000,'giaP/day'=>150000,'tinhtrang'=>'Chưa dọn','maDV'=>'','maNV'=>1,'trong'=>1],
            ['maP'=>'P103','tenP'=>'P103','loaiP'=>'Bình dân','giaP/hour'=>60000,'giaP/day'=>150000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>2,'trong'=>0],
            ['maP'=>'P104','tenP'=>'P104','loaiP'=>'Thương gia','giaP/hour'=>80000,'giaP/day'=>250000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>1,'trong'=>1],
            ['maP'=>'P105','tenP'=>'P105','loaiP'=>'Thương gia','giaP/hour'=>80000,'giaP/day'=>250000,'tinhtrang'=>'Chưa dọn','maDV'=>'','maNV'=>2,'trong'=>0],
            ['maP'=>'P106','tenP'=>'P106','loaiP'=>'Vip','giaP/hour'=>120000,'giaP/day'=>450000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>2,'trong'=>1],
            ['maP'=>'P201','tenP'=>'P201','loaiP'=>'Bình dân','giaP/hour'=>60000,'giaP/day'=>150000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>1,'trong'=>1],
            ['maP'=>'P202','tenP'=>'P202','loaiP'=>'Bình dân','giaP/hour'=>60000,'giaP/day'=>150000,'tinhtrang'=>'Chưa dọn','maDV'=>'','maNV'=>1,'trong'=>1],
            ['maP'=>'P203','tenP'=>'P203','loaiP'=>'Bình dân','giaP/hour'=>60000,'giaP/day'=>150000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>2,'trong'=>0],
            ['maP'=>'P204','tenP'=>'P204','loaiP'=>'Thương gia','giaP/hour'=>80000,'giaP/day'=>250000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>1,'trong'=>1],
            ['maP'=>'P205','tenP'=>'P205','loaiP'=>'Thương gia','giaP/hour'=>80000,'giaP/day'=>250000,'tinhtrang'=>'Chưa dọn','maDV'=>'','maNV'=>2,'trong'=>0],
            ['maP'=>'P206','tenP'=>'P206','loaiP'=>'Vip','giaP/hour'=>120000,'giaP/day'=>450000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>2,'trong'=>1],
            ['maP'=>'P301','tenP'=>'P301','loaiP'=>'Bình dân','giaP/hour'=>60000,'giaP/day'=>150000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>1,'trong'=>1],
            ['maP'=>'P302','tenP'=>'P302','loaiP'=>'Bình dân','giaP/hour'=>60000,'giaP/day'=>150000,'tinhtrang'=>'Chưa dọn','maDV'=>'','maNV'=>1,'trong'=>1],
            ['maP'=>'P303','tenP'=>'P303','loaiP'=>'Bình dân','giaP/hour'=>60000,'giaP/day'=>150000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>2,'trong'=>0],
            ['maP'=>'P304','tenP'=>'P304','loaiP'=>'Thương gia','giaP/hour'=>80000,'giaP/day'=>250000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>1,'trong'=>1],
            ['maP'=>'P305','tenP'=>'P305','loaiP'=>'Thương gia','giaP/hour'=>80000,'giaP/day'=>250000,'tinhtrang'=>'Chưa dọn','maDV'=>'','maNV'=>2,'trong'=>0],
            ['maP'=>'P306','tenP'=>'P306','loaiP'=>'Vip','giaP/hour'=>120000,'giaP/day'=>450000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>2,'trong'=>1],
            ['maP'=>'P401','tenP'=>'P401','loaiP'=>'Bình dân','giaP/hour'=>60000,'giaP/day'=>150000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>1,'trong'=>1],
            ['maP'=>'P402','tenP'=>'P402','loaiP'=>'Bình dân','giaP/hour'=>60000,'giaP/day'=>150000,'tinhtrang'=>'Chưa dọn','maDV'=>'','maNV'=>1,'trong'=>1],
            ['maP'=>'P403','tenP'=>'P403','loaiP'=>'Bình dân','giaP/hour'=>60000,'giaP/day'=>150000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>2,'trong'=>0],
            ['maP'=>'P404','tenP'=>'P404','loaiP'=>'Thương gia','giaP/hour'=>80000,'giaP/day'=>250000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>1,'trong'=>1],
            ['maP'=>'P405','tenP'=>'P405','loaiP'=>'Thương gia','giaP/hour'=>80000,'giaP/day'=>250000,'tinhtrang'=>'Chưa dọn','maDV'=>'','maNV'=>2,'trong'=>0],
            ['maP'=>'P406','tenP'=>'P406','loaiP'=>'Vip','giaP/hour'=>120000,'giaP/day'=>450000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>2,'trong'=>1],
            ['maP'=>'P501','tenP'=>'P501','loaiP'=>'Bình dân','giaP/hour'=>60000,'giaP/day'=>150000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>1,'trong'=>1],
            ['maP'=>'P502','tenP'=>'P502','loaiP'=>'Bình dân','giaP/hour'=>60000,'giaP/day'=>150000,'tinhtrang'=>'Chưa dọn','maDV'=>'','maNV'=>1,'trong'=>1],
            ['maP'=>'P503','tenP'=>'P503','loaiP'=>'Bình dân','giaP/hour'=>60000,'giaP/day'=>150000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>2,'trong'=>0],
            ['maP'=>'P504','tenP'=>'P504','loaiP'=>'Thương gia','giaP/hour'=>80000,'giaP/day'=>250000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>1,'trong'=>1],
            ['maP'=>'P505','tenP'=>'P505','loaiP'=>'Thương gia','giaP/hour'=>80000,'giaP/day'=>250000,'tinhtrang'=>'Chưa dọn','maDV'=>'','maNV'=>2,'trong'=>0],
            ['maP'=>'P506','tenP'=>'P506','loaiP'=>'Vip','giaP/hour'=>120000,'giaP/day'=>450000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>2,'trong'=>1],
            ['maP'=>'P601','tenP'=>'P601','loaiP'=>'Bình dân','giaP/hour'=>60000,'giaP/day'=>150000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>1,'trong'=>1],
            ['maP'=>'P602','tenP'=>'P602','loaiP'=>'Bình dân','giaP/hour'=>60000,'giaP/day'=>150000,'tinhtrang'=>'Chưa dọn','maDV'=>'','maNV'=>1,'trong'=>1],
            ['maP'=>'P603','tenP'=>'P603','loaiP'=>'Bình dân','giaP/hour'=>60000,'giaP/day'=>150000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>2,'trong'=>0],
            ['maP'=>'P604','tenP'=>'P604','loaiP'=>'Thương gia','giaP/hour'=>80000,'giaP/day'=>250000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>1,'trong'=>1],
            ['maP'=>'P605','tenP'=>'P605','loaiP'=>'Thương gia','giaP/hour'=>80000,'giaP/day'=>250000,'tinhtrang'=>'Chưa dọn','maDV'=>'','maNV'=>2,'trong'=>0],
            ['maP'=>'P606','tenP'=>'P606','loaiP'=>'Vip','giaP/hour'=>120000,'giaP/day'=>450000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>2,'trong'=>1],
            ['maP'=>'P701','tenP'=>'P701','loaiP'=>'Bình dân','giaP/hour'=>60000,'giaP/day'=>150000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>1,'trong'=>1],
            ['maP'=>'P702','tenP'=>'P702','loaiP'=>'Bình dân','giaP/hour'=>60000,'giaP/day'=>150000,'tinhtrang'=>'Chưa dọn','maDV'=>'','maNV'=>1,'trong'=>1],
            ['maP'=>'P703','tenP'=>'P703','loaiP'=>'Bình dân','giaP/hour'=>60000,'giaP/day'=>150000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>2,'trong'=>0],
            ['maP'=>'P704','tenP'=>'P704','loaiP'=>'Thương gia','giaP/hour'=>80000,'giaP/day'=>250000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>1,'trong'=>1],
            ['maP'=>'P705','tenP'=>'P705','loaiP'=>'Thương gia','giaP/hour'=>80000,'giaP/day'=>250000,'tinhtrang'=>'Chưa dọn','maDV'=>'','maNV'=>2,'trong'=>0],
            ['maP'=>'P706','tenP'=>'P706','loaiP'=>'Vip','giaP/hour'=>120000,'giaP/day'=>450000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>2,'trong'=>1],
            ['maP'=>'P801','tenP'=>'P801','loaiP'=>'Bình dân','giaP/hour'=>60000,'giaP/day'=>150000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>1,'trong'=>1],
            ['maP'=>'P802','tenP'=>'P802','loaiP'=>'Bình dân','giaP/hour'=>60000,'giaP/day'=>150000,'tinhtrang'=>'Chưa dọn','maDV'=>'','maNV'=>1,'trong'=>1],
            ['maP'=>'P803','tenP'=>'P803','loaiP'=>'Bình dân','giaP/hour'=>60000,'giaP/day'=>150000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>2,'trong'=>0],
            ['maP'=>'P804','tenP'=>'P804','loaiP'=>'Thương gia','giaP/hour'=>80000,'giaP/day'=>250000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>1,'trong'=>1],
            ['maP'=>'P805','tenP'=>'P805','loaiP'=>'Thương gia','giaP/hour'=>80000,'giaP/day'=>250000,'tinhtrang'=>'Chưa dọn','maDV'=>'','maNV'=>2,'trong'=>0],
            ['maP'=>'P806','tenP'=>'P806','loaiP'=>'Vip','giaP/hour'=>120000,'giaP/day'=>450000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>2,'trong'=>1],
            ['maP'=>'P901','tenP'=>'P901','loaiP'=>'Royal','giaP/hour'=>500000,'giaP/day'=>2000000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>1,'trong'=>1],
            ['maP'=>'P902','tenP'=>'P902','loaiP'=>'Royal','giaP/hour'=>500000,'giaP/day'=>2000000,'tinhtrang'=>'Chưa dọn','maDV'=>'','maNV'=>1,'trong'=>1],
            ['maP'=>'P903','tenP'=>'P903','loaiP'=>'Royal','giaP/hour'=>500000,'giaP/day'=>2000000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>2,'trong'=>0],
            ['maP'=>'P904','tenP'=>'P904','loaiP'=>'Royal','giaP/hour'=>500000,'giaP/day'=>2000000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>1,'trong'=>1],
            ['maP'=>'P905','tenP'=>'P905','loaiP'=>'Royal','giaP/hour'=>500000,'giaP/day'=>2000000,'tinhtrang'=>'Chưa dọn','maDV'=>'','maNV'=>2,'trong'=>0],
            ['maP'=>'P906','tenP'=>'P906','loaiP'=>'Royal','giaP/hour'=>500000,'giaP/day'=>2000000,'tinhtrang'=>'Đã dọn','maDV'=>'','maNV'=>2,'trong'=>1],
        ]);
    }

}
