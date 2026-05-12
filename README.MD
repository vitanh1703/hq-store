# 🛍️ H&Q STORE - HỆ THỐNG BÁN QUẦN ÁO TRỰC TUYẾN

## 🌐 Đồ án môn học: Xây dựng Website trên nền tảng Mã nguồn mở WordPress

H&Q Store là hệ thống website bán quần áo trực tuyến được xây dựng trên nền tảng **WordPress Nâng Cao**. Dự án sử dụng các plugin phổ biến trong hệ sinh thái WordPress như **WooCommerce**, **Elementor**, **Astra Theme** kết hợp với các đoạn mã tùy chỉnh để xây dựng một website thương mại điện tử hoàn chỉnh.

Hệ thống hỗ trợ đầy đủ quy trình mua sắm trực tuyến: xem sản phẩm, tìm kiếm, lọc sản phẩm, thêm vào giỏ hàng, đặt hàng, thanh toán, quản lý đơn hàng, đánh giá sản phẩm và chăm sóc khách hàng sau mua.

---

## 🔗 Demo & Hosting

- **Website URL:** `hqstore.gt.tc`
- **Tài khoản Admin:** `admin`/`123456`

---

## 👥 Thành viên thực hiện

| STT | Họ và tên | Mã sinh viên | Vai trò |
|-----|-----------|--------------|---------|
| 1 | **Diêm Việt Anh** | 23810310083 | Nhóm trưởng |
| 2 | **Nguyễn Thị Hảo** | 23810310152 | Thành viên |
| 2 | **Đặng Thị Quỳnh** | 23810310156 | Thành viên |

---

## 📌 Tổng quan dự án

### 🎯 Mục tiêu đề tài

- Làm chủ hệ quản trị nội dung **WordPress** và hệ sinh thái plugin.
- Xây dựng website bán quần áo trực tuyến có giao diện hiện đại, dễ sử dụng.
- Sử dụng **WooCommerce** để quản lý sản phẩm, giỏ hàng, đơn hàng và thanh toán.
- Tùy chỉnh giao diện bằng **Elementor** và **Astra Theme**.
- Quản lý sản phẩm theo danh mục, size, màu sắc, giá bán và tồn kho.
- Hỗ trợ khách hàng tìm kiếm, lọc sản phẩm, đặt hàng và theo dõi đơn hàng.
- Ứng dụng các đoạn mã tùy chỉnh để mở rộng chức năng như wishlist, voucher, thống kê doanh thu và chăm sóc khách hàng.

---

## 👥 Vai trò người dùng

### 1. Khách hàng

Khách hàng là người sử dụng website để mua sắm sản phẩm thời trang. Các chức năng chính bao gồm:

- Đăng ký và đăng nhập tài khoản.
- Xem danh sách sản phẩm.
- Tìm kiếm sản phẩm theo tên.
- Lọc sản phẩm theo danh mục, giá, size, màu sắc.
- Xem chi tiết sản phẩm.
- Chọn size, màu sắc và số lượng.
- Thêm sản phẩm vào giỏ hàng.
- Đặt hàng và thanh toán.
- Theo dõi trạng thái đơn hàng.
- Cập nhật thông tin cá nhân và địa chỉ giao hàng.

### 2. Quản trị viên

Quản trị viên là người quản lý toàn bộ hệ thống website. Các chức năng chính bao gồm:

- Quản lý sản phẩm quần áo.
- Quản lý danh mục sản phẩm.
- Quản lý size, màu sắc và biến thể sản phẩm.
- Quản lý đơn hàng.
- Quản lý khách hàng.
- Quản lý mã giảm giá.
- Quản lý bài viết tin tức.
- Theo dõi doanh thu và tình trạng hoạt động của website.

---

## 🛠 Công nghệ và Plugin sử dụng

| Thành phần | Công nghệ / Plugin |
|-----------|---------------------|
| Core System | WordPress 6.x, PHP, MySQL |
| Giao diện | Elementor, Astra Theme |
| Thương mại điện tử | WooCommerce |
| Quản lý sản phẩm | WooCommerce Products |
| Danh mục sản phẩm | Product Categories |
| Thuộc tính sản phẩm | Product Attributes |
| Biến thể sản phẩm | Product Variations |
| Logic tùy chỉnh | Code Snippets, Custom Shortcodes |
| Thanh toán | COD, QR Banking hoặc cổng thanh toán trực tuyến VN Pay|
| Email | WP Mail SMTP |
| Hóa đơn | PDF Invoices & Packing Slips |
| Slider / Banner | Smart Slider 3 |
| Tối ưu giao diện | Ultimate Addons for Elementor |
| Cơ sở dữ liệu | MySQL / MariaDB |

---

## 🧱 Quy trình xử lý nghiệp vụ

### 1. Quản lý sản phẩm

Quản trị viên thêm sản phẩm vào hệ thống thông qua WooCommerce. Mỗi sản phẩm có thể bao gồm:

- Tên sản phẩm.
- Hình ảnh sản phẩm.
- Giá bán.
- Giá khuyến mãi.
- Mô tả ngắn.
- Mô tả chi tiết.
- Danh mục sản phẩm.
- Size.
- Màu sắc.
- Trạng thái sản phẩm.

### 2. Hiển thị sản phẩm

Website hiển thị sản phẩm theo các nhóm như:

- Áo khoác.
- Activewear.
- Casual.
- Evening Dresses.
- Work & Office.
- Áo len & Áo dệt kim.
- Sơ thun.
- Uncategorized.

### 3. Quy trình mua hàng

Quy trình mua hàng của khách hàng gồm các bước:

1. Khách hàng truy cập website.
2. Đăng nhập/Đăng ký tài khoản.
3. Tìm kiếm hoặc chọn danh mục sản phẩm.
4. Xem chi tiết sản phẩm.
5. Chọn size, màu sắc và số lượng.
6. Thêm sản phẩm vào giỏ hàng.
7. Kiểm tra giỏ hàng.
8. Nhập thông tin giao hàng.
9. Chọn phương thức thanh toán.
10. Xác nhận đặt hàng.
11. Hệ thống tạo đơn hàng và gửi email xác nhận.

### 4. Xử lý đơn hàng

Sau khi khách hàng đặt hàng, hệ thống sẽ tạo đơn hàng trong WooCommerce. Quản trị viên có thể cập nhật trạng thái đơn hàng gồm:

- Chờ xử lý.
- Đang xử lý.
- Đang giao hàng.
- Hoàn thành.
- Đã hủy.
- Hoàn tiền.

### 5. Chăm sóc khách hàng

Sau khi mua hàng, khách hàng có thể:

- Xem lại lịch sử đơn hàng.
- Theo dõi trạng thái đơn hàng.
- Đánh giá sản phẩm.
- Nhận mã giảm giá.
- Cập nhật thông tin tài khoản.

---

## 🚀 Các chức năng chính

### 🛒 Chức năng dành cho khách hàng

- Xem danh sách sản phẩm.
- Xem chi tiết sản phẩm.
- Tìm kiếm sản phẩm.
- Lọc sản phẩm theo danh mục, giá, size, màu sắc.
- Thêm sản phẩm vào giỏ hàng.
- Cập nhật số lượng sản phẩm trong giỏ hàng.
- Xóa sản phẩm khỏi giỏ hàng.
- Đặt hàng.
- Thanh toán đơn hàng.
- Đăng ký tài khoản.
- Đăng nhập tài khoản.
- Quản lý thông tin cá nhân.
- Theo dõi lịch sử đơn hàng.
- Đánh giá sản phẩm.
- Đọc tin tức thời trang.

### 🧑‍💼 Chức năng dành cho quản trị viên

- Thêm, sửa, xóa sản phẩm.
- Quản lý danh mục sản phẩm.
- Quản lý thuộc tính sản phẩm.
- Quản lý biến thể sản phẩm.
- Quản lý đơn hàng.
- Cập nhật trạng thái đơn hàng.
- Quản lý khách hàng.
- Quản lý mã giảm giá.
- Quản lý bài viết tin tức.
- Theo dõi doanh thu.
- Quản lý giao diện website.

---

## 🎁 Chức năng nổi bật

### 1. Search & Filter

Hệ thống cho phép khách hàng tìm kiếm và lọc sản phẩm theo nhiều tiêu chí:

- Tên sản phẩm.
- Danh mục.
- Khoảng giá.
- Size.
- Màu sắc.
- Sản phẩm khuyến mãi.


### 2. Giỏ hàng

Khách hàng có thể thêm nhiều sản phẩm vào giỏ hàng, thay đổi số lượng hoặc xóa sản phẩm trước khi thanh toán.

### 3. Mã giảm giá

Hệ thống hỗ trợ tạo và áp dụng mã giảm giá cho đơn hàng. Mã giảm giá có thể áp dụng theo:

- Phần trăm.
- Số tiền cố định.
- Danh mục sản phẩm.
- Giá trị đơn hàng tối thiểu.
- Số lần sử dụng.

### 4. Quản lý đơn hàng

Quản trị viên có thể xem chi tiết đơn hàng, thông tin khách hàng, sản phẩm đã mua, tổng tiền và trạng thái xử lý đơn hàng.

### 5. Đánh giá sản phẩm

Khách hàng có thể đánh giá sao và viết nhận xét cho sản phẩm sau khi mua hàng.

### 6. Tin tức thời trang

Website có chuyên mục bài viết chia sẻ xu hướng thời trang, cách phối đồ, thông tin khuyến mãi và bộ sưu tập mới.

---

## 📁 Cấu trúc thư mục đề xuất

```text
hq-store/
├── wp-content/
│   ├── themes/
│   │   └── astra/
│   │
│   ├── plugins/
│   │   ├── astra-sites/
│   │   ├── cartflows/
│   │   ├── custom-vnpay/
│   │   ├── elementor/
│   │   ├── header-footer-elementor/
│   │   ├── loco-translate/
│   │   ├── modern-cart/
│   │   ├── hnextend-facebook-connect/
│   │   ├── power-coupons/
│   │   ├── sureforms/
│   │   ├── surerank/
│   │   ├── variation-swatches-woo/
│   │   ├── woo-cart-abandonment-recovery/
│   │   ├── woocommerce/
│   │   └── woocommerce-payments/
│   │
│   └── uploads/
│
├── database/
│   └── hq_store.sql
│
│
└── README.md
```

---

## 📥 Hướng dẫn cài đặt và chạy Local

### 1. Yêu cầu hệ thống

Trước khi cài đặt, cần chuẩn bị:

- XAMPP hoặc Laragon.
- PHP 7.4 trở lên.
- MySQL hoặc MariaDB.
- WordPress phiên bản mới nhất.
- Trình duyệt web như Chrome, Edge hoặc Firefox.

### 2. Các bước cài đặt

#### Bước 1: Copy source

Copy thư mục source website vào:

- Nếu dùng XAMPP:

```text
C:/xampp/htdocs/hq-store
```

- Nếu dùng Laragon:

```text
C:/laragon/www/hq-store
```

#### Bước 2: Tạo database

Mở phpMyAdmin và tạo database mới, ví dụ:

```text
hq_store
```

#### Bước 3: Import database

Import file database:

```text
database/hq_store.sql
```

vào database vừa tạo.

#### Bước 4: Cấu hình file wp-config.php

Mở file:

```text
wp-config.php
```

và chỉnh sửa thông tin kết nối database:

```php
define('DB_NAME', 'hq_store');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
```

#### Bước 5: Chạy website

Truy cập đường dẫn:

```text
http://localhost/hq-store
```

#### Bước 6: Đăng nhập trang quản trị

Truy cập:

```text
http://localhost/hq-store/wp-admin
```

Sau đó đăng nhập bằng tài khoản quản trị đã được cấu hình.

---

## 🧪 Kiểm thử chức năng

Một số chức năng cần kiểm thử sau khi cài đặt:

- Truy cập trang chủ.
- Xem danh sách sản phẩm.
- Xem chi tiết sản phẩm.
- Tìm kiếm sản phẩm.
- Lọc sản phẩm theo danh mục, giá, size, màu sắc.
- Thêm sản phẩm vào giỏ hàng.
- Cập nhật số lượng trong giỏ hàng.
- Đặt hàng.
- Kiểm tra email xác nhận đơn hàng.
- Quản lý đơn hàng trong trang Admin.
- Thêm sản phẩm mới.
- Sửa thông tin sản phẩm.
- Tạo mã giảm giá.
- Kiểm tra chức năng đánh giá sản phẩm.

---

## 📊 Kết quả đạt được

Sau quá trình xây dựng, hệ thống H&Q Store đạt được các kết quả sau:

- Xây dựng được website bán quần áo trực tuyến trên nền tảng WordPress.
- Giao diện hiện đại, dễ sử dụng và phù hợp với lĩnh vực thời trang.
- Quản lý được sản phẩm, danh mục, biến thể, tồn kho và đơn hàng.
- Hỗ trợ quy trình mua hàng trực tuyến đầy đủ.
- Có chức năng giỏ hàng, thanh toán, mã giảm giá và quản lý đơn hàng.
- Hỗ trợ khách hàng đăng ký, đăng nhập và theo dõi lịch sử mua hàng.
- Có khả năng mở rộng thêm các chức năng nâng cao trong tương lai.

---

## 🧭 Hướng phát triển

Trong tương lai, hệ thống có thể được phát triển thêm các chức năng:

- Tích hợp thanh toán trực tuyến qua VNPay.
- Xây dựng hệ thống gợi ý sản phẩm dựa trên lịch sử mua hàng.
- Phát triển hệ thống tích điểm thành viên.
- Tích hợp theo dõi vận chuyển đơn hàng.
- Tối ưu SEO cho sản phẩm và bài viết.
- Xây dựng dashboard thống kê doanh thu nâng cao.
- Phát triển giao diện đa ngôn ngữ.
- Tối ưu tốc độ tải trang và trải nghiệm người dùng trên thiết bị di động.

---

## 📌 Ghi chú

- Đây là đồ án phục vụ mục đích học tập.
- Một số chức năng có thể được tùy chỉnh thêm tùy theo yêu cầu của giảng viên.
- Khi triển khai thực tế cần bổ sung các yếu tố bảo mật, sao lưu dữ liệu và tối ưu hiệu năng.

---

## © Bản quyền

**© 2026 H&Q Store - Đồ án WordPress Nâng Cao.**
