# 🏠 Larazillow

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

<p align="center">
  <a href="https://github.com/HungDang123/larazillow/actions"><img src="https://img.shields.io/github/workflow/status/HungDang123/larazillow/tests?style=flat-square" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## 📋 Giới thiệu

Larazillow là một ứng dụng web bất động sản hiện đại được xây dựng trên nền tảng Laravel và Vue.js. Dự án này cung cấp một nền tảng toàn diện cho việc quản lý, tìm kiếm và giao dịch bất động sản.

## ✨ Tính năng

- 🔍 Tìm kiếm bất động sản với nhiều bộ lọc nâng cao
- 📊 Bảng điều khiển trực quan cho người dùng và quản trị viên
- 📱 Giao diện người dùng phản hồi, thân thiện với thiết bị di động
- 🔐 Hệ thống xác thực và phân quyền người dùng toàn diện
- 📸 Quản lý hình ảnh bất động sản đa phương tiện
- 📝 Hệ thống quản lý thông tin bất động sản chi tiết
- 📅 Lên lịch xem bất động sản
- 💬 Hệ thống tin nhắn trực tiếp giữa người mua và người bán

## 🚀 Cài đặt

### Yêu cầu

- PHP >= 8.1
- Node.js >= 16.x
- Composer
- MySQL hoặc PostgreSQL

### Các bước cài đặt

1. Clone repository:
```bash
git clone https://github.com/HungDang123/larazillow.git
cd larazillow
```

2. Cài đặt dependencies:
```bash
composer install
npm install
```

3. Thiết lập môi trường:
```bash
cp .env.example .env
php artisan key:generate
```

4. Cấu hình cơ sở dữ liệu trong file `.env`

5. Chạy migrations:
```bash
php artisan migrate
```

6. (Tùy chọn) Tạo dữ liệu mẫu:
```bash
php artisan db:seed
```

7. Biên dịch assets:
```bash
npm run dev
```

8. Khởi chạy server:
```bash
php artisan serve
```

## 🧪 Testing

```bash
php artisan test
```

## 📚 Tài liệu

Chi tiết về cách sử dụng và API có thể được tìm thấy trong thư mục `docs` hoặc truy cập trang web tài liệu của dự án.

## 👥 Đóng góp

Cảm ơn bạn đã quan tâm đến việc đóng góp cho Larazillow! Vui lòng đọc [hướng dẫn đóng góp](CONTRIBUTING.md) để biết cách tham gia.

## 📄 Giấy phép

Dự án này được cấp phép theo [Giấy phép MIT](LICENSE).

## 🙏 Lời cảm ơn

- [Laravel](https://laravel.com) - Framework PHP mạnh mẽ
- [Vue.js](https://vuejs.org) - Framework JavaScript tiến bộ
- [Inertia.js](https://inertiajs.com) - Kết nối Laravel và Vue.js một cách mượt mà
- [Tailwind CSS](https://tailwindcss.com) - Framework CSS tiện ích-trước