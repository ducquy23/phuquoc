# Database Schema - Phú Quốc Website

## 📊 Tổng Quan

Database schema cho website cho thuê căn hộ Phú Quốc, bao gồm quản lý apartments, blog posts, contacts, bookings, và các tính năng hỗ trợ.

---

## 🗂️ Danh Sách Bảng

### Core Tables (Đã có)
1. ✅ **users** - Người dùng hệ thống
2. ✅ **pages** - CMS pages
3. ✅ **options** - Site settings (key-value)
4. ✅ **media** - Media files (từ Curator)

### New Tables (Cần tạo)
5. 🆕 **apartments** - Căn hộ cho thuê
6. 🆕 **posts** - Blog posts
7. 🆕 **contacts** - Form liên hệ
8. 🆕 **bookings** - Đặt phòng/Booking
9. 🆕 **favorites** - Yêu thích
10. 🆕 **reviews** - Đánh giá

### Plugin Tables (Nếu cài)
11. 📦 **tags** - Tags (Spatie Tags)
12. 📦 **taggables** - Tag relationships (Spatie Tags)
13. 📦 **activity_log** - Activity logs (Spatie Activity Log)

---

## 📋 Chi Tiết Các Bảng

### 1. **apartments** - Căn Hộ Cho Thuê

**Mục đích**: Quản lý tất cả thông tin về căn hộ cho thuê

**Các trường chính**:
```sql
- id (bigint, PK)
- title (string) - Tiêu đề căn hộ
- slug (string, unique) - URL slug
- description (text) - Mô tả chi tiết
- excerpt (text) - Mô tả ngắn cho listing
- property_type (string) - Loại: apartment, villa, studio, condo
- bedrooms (integer) - Số phòng ngủ
- bathrooms (integer) - Số phòng tắm
- area (decimal) - Diện tích (m²)
- floor (integer) - Tầng
- total_floors (integer) - Tổng số tầng
- location (string) - Vị trí: "Sunset Town, An Thoi"
- address (string) - Địa chỉ đầy đủ
- district (string) - Quận/Huyện
- latitude (decimal) - Vĩ độ
- longitude (decimal) - Kinh độ
- price_monthly (decimal) - Giá thuê tháng (USD)
- price_daily (decimal) - Giá thuê ngày (USD)
- currency (string) - Đơn vị tiền tệ
- deposit (decimal) - Tiền đặt cọc
- amenities (json) - Tiện ích: ['wifi', 'pool', 'gym']
- features (json) - Đặc điểm: ['ocean_view', 'balcony']
- featured_image_id (bigint, FK -> media.id)
- gallery_image_ids (json) - Array of media IDs
- status (string) - available, rented, maintenance, sold
- is_featured (boolean) - Nổi bật
- is_published (boolean) - Đã publish
- published_at (timestamp)
- available_from (timestamp) - Có sẵn từ ngày
- meta_title, meta_description, meta_keywords - SEO
- created_by, updated_by (FK -> users.id)
- timestamps, soft_deletes
```

**Indexes**:
- status, is_published, is_featured
- property_type, bedrooms, price_monthly
- district, published_at

---

### 2. **posts** - Blog Posts

**Mục đích**: Quản lý bài viết blog

**Các trường chính**:
```sql
- id (bigint, PK)
- title (string) - Tiêu đề bài viết
- slug (string, unique) - URL slug
- excerpt (text) - Tóm tắt
- content (longtext) - Nội dung HTML
- author_id (bigint, FK -> users.id)
- featured_image_id (bigint, FK -> media.id)
- category (string) - apartment-hunting, local-life, travel-tips, legal-visa
- reading_time (integer) - Thời gian đọc (phút)
- is_featured (boolean) - Nổi bật
- is_published (boolean) - Đã publish
- published_at (timestamp)
- meta_title, meta_description, meta_keywords - SEO
- views (integer) - Lượt xem
- likes (integer) - Lượt thích
- timestamps, soft_deletes
```

**Indexes**:
- is_published, is_featured, category
- author_id, published_at, views

**Note**: Tags sẽ dùng Spatie Tags plugin (bảng tags và taggables)

---

### 3. **contacts** - Form Liên Hệ

**Mục đích**: Lưu trữ các inquiry/contact form submissions

**Các trường chính**:
```sql
- id (bigint, PK)
- name (string) - Tên người liên hệ
- email (string) - Email
- phone (string) - Số điện thoại
- subject (string) - Chủ đề
- message (text) - Nội dung
- apartment_id (bigint, nullable, FK -> apartments.id) - Nếu liên quan đến căn hộ
- status (string) - new, read, replied, archived
- admin_notes (text) - Ghi chú nội bộ
- responded_by (bigint, nullable, FK -> users.id)
- responded_at (timestamp)
- ip_address (string) - IP của người gửi
- user_agent (text) - Browser info
- timestamps
```

**Indexes**:
- status, email, apartment_id, created_at

---

### 4. **bookings** - Đặt Phòng

**Mục đích**: Quản lý bookings/reservations

**Các trường chính**:
```sql
- id (bigint, PK)
- booking_number (string, unique) - Mã booking: BK-2025-001
- apartment_id (bigint, FK -> apartments.id)
- user_id (bigint, nullable, FK -> users.id) - Nếu là user đã đăng ký
- guest_name, guest_email, guest_phone - Thông tin khách (nếu không đăng ký)
- check_in (date) - Ngày check-in
- check_out (date) - Ngày check-out
- nights (integer) - Số đêm
- guests (integer) - Số khách
- price_per_night (decimal) - Giá mỗi đêm
- total_price (decimal) - Tổng tiền
- deposit (decimal) - Tiền đặt cọc
- balance (decimal) - Số tiền còn lại
- currency (string) - USD, VND
- status (string) - pending, confirmed, checked_in, checked_out, cancelled, refunded
- payment_status (string) - pending, partial, paid, refunded
- payment_method (string) - cash, bank_transfer, credit_card
- payment_notes (text)
- paid_at (timestamp)
- special_requests (text) - Yêu cầu đặc biệt
- admin_notes (text) - Ghi chú nội bộ
- cancelled_at (timestamp)
- cancelled_by (bigint, nullable, FK -> users.id)
- cancellation_reason (text)
- timestamps, soft_deletes
```

**Indexes**:
- booking_number, apartment_id, user_id
- status, payment_status
- check_in, check_out, created_at

---

### 5. **favorites** - Yêu Thích

**Mục đích**: Lưu danh sách yêu thích của users

**Các trường chính**:
```sql
- id (bigint, PK)
- user_id (bigint, nullable, FK -> users.id)
- apartment_id (bigint, FK -> apartments.id)
- guest_session_id (string, nullable) - Cho guest users
- timestamps
```

**Unique Constraint**: (user_id, apartment_id) - Mỗi user chỉ favorite 1 lần

---

### 6. **reviews** - Đánh Giá

**Mục đích**: Reviews/ratings cho apartments

**Các trường chính**:
```sql
- id (bigint, PK)
- apartment_id (bigint, FK -> apartments.id)
- user_id (bigint, nullable, FK -> users.id)
- booking_id (bigint, nullable, FK -> bookings.id) - Link đến booking
- guest_name, guest_email - Nếu không đăng ký
- title (string) - Tiêu đề review
- content (text) - Nội dung review
- rating_overall (tinyint) - Đánh giá tổng thể (1-5)
- rating_cleanliness (tinyint) - Độ sạch sẽ
- rating_location (tinyint) - Vị trí
- rating_value (tinyint) - Giá trị
- rating_communication (tinyint) - Giao tiếp
- is_approved (boolean) - Đã duyệt
- is_featured (boolean) - Nổi bật
- response (text) - Phản hồi từ chủ nhà
- responded_by (bigint, nullable, FK -> users.id)
- responded_at (timestamp)
- timestamps, soft_deletes
```

**Indexes**:
- apartment_id, user_id, is_approved
- rating_overall, created_at

---

## 🔗 Relationships

### Apartments
- `belongsTo` User (created_by, updated_by)
- `hasMany` Bookings
- `hasMany` Favorites
- `hasMany` Reviews
- `hasMany` Contacts (inquiries)
- `belongsToMany` Tags (via Spatie Tags)
- `hasOne` Media (featured_image)
- `hasMany` Media (gallery - via JSON array)

### Posts
- `belongsTo` User (author)
- `hasOne` Media (featured_image)
- `belongsToMany` Tags (via Spatie Tags)

### Bookings
- `belongsTo` Apartment
- `belongsTo` User (guest)
- `hasOne` Review

### Contacts
- `belongsTo` Apartment (optional)
- `belongsTo` User (responded_by)

### Reviews
- `belongsTo` Apartment
- `belongsTo` User (reviewer)
- `belongsTo` Booking (optional)

### Favorites
- `belongsTo` User
- `belongsTo` Apartment

---

## 📦 Plugin Tables (Nếu cài)

### Spatie Tags
- **tags** - Bảng tags
- **taggables** - Pivot table cho tag relationships

### Spatie Activity Log
- **activity_log** - Log mọi thay đổi trong hệ thống

### Spatie Media Library (Nếu dùng thay Curator)
- **media** - Media files với relationships

---

## 🚀 Migration Commands

```bash
# Chạy tất cả migrations
php artisan migrate

# Chạy từng migration cụ thể
php artisan migrate --path=database/migrations/2025_01_15_100000_create_apartments_table.php
php artisan migrate --path=database/migrations/2025_01_15_100001_create_posts_table.php
php artisan migrate --path=database/migrations/2025_01_15_100002_create_contacts_table.php
php artisan migrate --path=database/migrations/2025_01_15_100003_create_bookings_table.php
php artisan migrate --path=database/migrations/2025_01_15_100004_create_favorites_table.php
php artisan migrate --path=database/migrations/2025_01_15_100005_create_reviews_table.php

# Rollback
php artisan migrate:rollback --step=6
```

---

## 📝 Notes

### 1. **Media Management**
- Sử dụng **Curator** cho featured images và galleries
- `featured_image_id` và `gallery_image_ids` reference đến bảng `media` của Curator
- Có thể dùng thêm **Spatie Media Library** cho advanced features

### 2. **Tags & Categories**
- **Posts**: Dùng Spatie Tags cho tags, field `category` cho main category
- **Apartments**: Có thể dùng tags cho location, amenities, etc.

### 3. **SEO Fields**
- Tất cả content tables đều có: `meta_title`, `meta_description`, `meta_keywords`
- Có thể thêm Open Graph fields nếu cần

### 4. **Soft Deletes**
- `apartments`, `posts`, `bookings`, `reviews` có soft deletes
- Giữ lại data để audit, có thể restore

### 5. **JSON Fields**
- `amenities`, `features`, `extra` dùng JSON cho flexibility
- Dễ thêm fields mới mà không cần migration

### 6. **Guest Users**
- `bookings`, `contacts`, `reviews`, `favorites` hỗ trợ guest users
- Dùng `guest_session_id` hoặc `guest_email` để track

### 7. **Status Fields**
- Dùng string enum cho status fields
- Dễ mở rộng, không cần migration khi thêm status mới

---

## 🔄 Next Steps

1. ✅ Tạo migrations (đã xong)
2. 🔄 Tạo Models với relationships
3. 🔄 Tạo Filament Resources
4. 🔄 Seed sample data (optional)
5. 🔄 Tạo Factories cho testing

---

## 📊 ER Diagram (Text)

```
users
  ├── apartments (created_by, updated_by)
  ├── posts (author_id)
  ├── bookings (user_id, cancelled_by)
  ├── contacts (responded_by)
  ├── reviews (user_id, responded_by)
  └── favorites (user_id)

apartments
  ├── bookings
  ├── favorites
  ├── reviews
  ├── contacts
  └── media (featured_image_id, gallery_image_ids)

posts
  └── media (featured_image_id)

bookings
  └── reviews

tags (Spatie)
  └── taggables (apartments, posts)
```

---

## ✅ Checklist

- [x] Apartments table
- [x] Posts table
- [x] Contacts table
- [x] Bookings table
- [x] Favorites table
- [x] Reviews table
- [ ] Models với relationships
- [ ] Filament Resources
- [ ] Seeders
- [ ] Factories

