@extends('layouts.be')
 @section('navbar')

<div class="d-inline-block d-lg-none  ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle"><span
            class="icon-menu h3"></span></a></div>
<ul class="site-menu js-clone-nav d-none d-lg-block">
    <li>
        <a href="{{route('trangchu')}}">Trang chủ</a></li>
    <li><a href="{{route('sukien')}}">Sự kiện</a></li>
    <li><a href="{{route('employee.bookroom.store.get.khach')}}">Đặt phòng</a></li>
    <li><a href="{{route('lienhe')}}">Liên hệ</a></li>
    <li><a href="{{route('login')}}">Đăng nhập</a></li>
</ul>
</div>


@endsection


@section('body')

    <div class="site-section site-section-sm">
      <div class="container">
        <div class="row">

          <div class="col-md-12 col-lg-8 mb-5">
              <a href="#" class="d-block mb-0 thumbnail"><img src="public/images/img_1.jpg" alt="Image" class="img-fluid"></a>
          </div>
          <div class="col-lg-4">
              <div class="p-4 mb-3 bg-white">
                  <h2 class="h5 text-black mb-3">Phòng Popularly</h2>

                  <p class="mb-4">- Các phòng máy lạnh được trang bị truyền hình cáp màn hình phẳng, minibar và tủ quần áo. Phòng tắm riêng đi kèm với vòi sen, đồ vệ sinh cá nhân miễn phí và máy sấy tóc. Dép cũng được cung cấp cho khách.</p>

                  <p class="mb-0">- WiFi miễn phí có trong tất cả các phòng.</p>
                  <p class="mb-0">- Theo giờ: 60.000đ (2 giờ ).</p>
                  <p class="mb-0">- Theo ngày: 150.000đ.</p>


                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <form action="{{route('employee.bookroom.store.get.khach')}}" method="get">
                        <input type="hidden" name="nameRoom" value="Popularly">
                        <input type="hidden" name="number" value="2">
                        <input type="submit" value="Đặt phòng" class="btn btn-primary pill px-4 py-2">
                        </form>
                    </div>
                </div>

          </div>

        </div>

      </div>

    </div>



        <div class="product-footer">
          <div class="container">

          <div class="woocommerce-tabs wc-tabs-wrapper container tabbed-content">
            <ul class="tabs wc-tabs product-tabs small-nav-collapse nav nav-uppercase nav-line nav-left" role="tablist">

                  </ul>
            <div class="tab-panels">
                      <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content active" id="tab-description" role="tabpanel" aria-labelledby="tab-title-description">



        <h3 style="text-align: center;">THÔNG TIN CHI TIẾT</h3>

        <div class="row row-small" id="row-162144212">

        <div class="col medium-4 small-12 large-4"><div class="col-inner">

        <ul class="dt-sc-fancy-list">
        <li>Bữa sáng đầy đủ</li>
        <li>Minibar (đầy đủ, một số đồ uống miễn phí)</li>
        <li>Chăn đệm cao cấp</li>
        <li>Máy sấy tóc</li>
        <li>Chỉ có vòi sen</li>
        <li>Phòng tắm riêng</li>
        <li>Cuộc gọi nội hạt miễn phí</li>
        <li>TV LED</li>
        </ul>

        </div></div>
        <div class="col medium-4 small-12 large-4"><div class="col-inner">

        <ul class="dt-sc-fancy-list">
        <li>Dép lê</li>
        <li>Truy cập internet dial-up miễn phí</li>
        <li>Dịch vụ phòng (24 giờ)</li>
        <li>Truyền hình cáp</li>
        <li>Dọn phòng</li>
        <li>Vòi sen thủy lực</li>
        <li>Giường sofa</li>
        <li>Wi-Fi miễn phí</li>
        </ul>

        </div></div>
        <div class="col medium-4 small-12 large-4"><div class="col-inner">

        <ul class="dt-sc-fancy-list">
        <li>Internet tốc độ cao không dây</li>
        <li>WiFi miễn phí</li>
        <li>Không hút thuốc</li>
        <li>Điều hòa nhiệt độ</li>
        <li>Kênh phim cao cấp</li>
        <li>Đồ dùng nhà tắm</li>
        <li>Kênh phim chiếu lần đầu</li>
        <li>Đồ dùng phòng tắm miễn phí</li>
        </ul>

        </div></div>
        </div>

                </div>
                  </div><!-- .tab-panels -->
          </div><!-- .tabbed-content -->

          </div><!-- .container -->
        </div><!-- .product-footer -->
        </div>

  @endsection
