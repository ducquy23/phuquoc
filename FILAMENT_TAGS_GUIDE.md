# Hướng Dẫn Sử Dụng Filament Spatie Tags Plugin

## 📦 Đã Cài Đặt

✅ **Filament Spatie Tags Plugin** (v3.3.0) - Tương thích với Filament 3.3
✅ **Spatie Laravel Tags** (v4.10.1) - Package cơ bản
✅ **Migrations** - Đã chạy migrations cho bảng `tags` và `taggables`

---

## 🎯 Mục Đích Sử Dụng

### 1. **Tags cho Blog Posts** (`blog_tags`)
- Tags như: **Phú Quốc**, **Căn hộ**, **Du lịch**, **Ẩm thực**, **Văn hóa**, v.v.
- Dùng để phân loại và tìm kiếm bài viết blog

### 2. **Categories cho Apartments** (`apartment_categories`)
- Categories như: **Studio**, **1BR**, **2BR**, **3BR**, **Penthouse**, v.v.
- Dùng để phân loại căn hộ theo số phòng

### 3. **Location Tags cho Apartments** (`locations`)
- Locations như: **Sunset Town**, **An Thoi**, **Duong Dong**, **Bai Dai**, v.v.
- Dùng để đánh dấu vị trí căn hộ

---

## 📝 Cách Sử Dụng trong Filament Admin

### **Blog Posts**

1. Vào **Content > Blog Posts**
2. Tạo hoặc chỉnh sửa một bài viết
3. Trong section **"Tags"**, bạn sẽ thấy trường **"Blog Tags"**
4. Nhập tags như: `Phú Quốc`, `Căn hộ`, `Du lịch` (mỗi tag cách nhau bằng Enter hoặc dấu phẩy)
5. Tags sẽ tự động được lưu với type `blog_tags`

**Ví dụ tags cho blog:**
- Phú Quốc
- Căn hộ
- Du lịch
- Ẩm thực
- Văn hóa
- Kinh nghiệm
- Hướng dẫn

### **Apartments**

1. Vào **Properties > Apartments**
2. Tạo hoặc chỉnh sửa một căn hộ
3. Trong section **"Tags & Categories"**, bạn sẽ thấy 2 trường:

   **a) Categories:**
   - Nhập categories như: `Studio`, `1BR`, `2BR`, `3BR`
   - Tags sẽ được lưu với type `apartment_categories`

   **b) Location Tags:**
   - Nhập locations như: `Sunset Town`, `An Thoi`, `Duong Dong`
   - Tags sẽ được lưu với type `locations`

**Ví dụ categories:**
- Studio
- 1BR (1 Bedroom)
- 2BR (2 Bedrooms)
- 3BR (3 Bedrooms)
- Penthouse

**Ví dụ locations:**
- Sunset Town
- An Thoi
- Duong Dong
- Bai Dai
- Ong Lang
- Cua Can

---

## 💻 Sử Dụng trong Code

### **Lấy tags từ Model**

```php
// Blog Post
$post = Post::find(1);

// Lấy tất cả tags
$allTags = $post->tags;

// Lấy chỉ blog tags
$blogTags = $post->tags()->where('type', 'blog_tags')->get();

// Hoặc dùng helper method
$blogTags = $post->blogTags;

// Apartment
$apartment = Apartment::find(1);

// Lấy categories
$categories = $apartment->tags()->where('type', 'apartment_categories')->get();
// Hoặc
$categories = $apartment->categories;

// Lấy location tags
$locations = $apartment->tags()->where('type', 'locations')->get();
// Hoặc
$locations = $apartment->locationTags;
```

### **Gán tags cho Model**

```php
// Gán tags với type cụ thể
$post->syncTagsWithType(['Phú Quốc', 'Du lịch'], 'blog_tags');

$apartment->syncTagsWithType(['Studio', '1BR'], 'apartment_categories');
$apartment->syncTagsWithType(['Sunset Town', 'An Thoi'], 'locations');

// Hoặc gán tags không có type (sẽ dùng default type)
$post->syncTags(['Tag 1', 'Tag 2']);
```

### **Tìm kiếm theo tags**

```php
// Tìm tất cả posts có tag "Phú Quốc"
$posts = Post::withAnyTags(['Phú Quốc'], 'blog_tags')->get();

// Tìm apartments có category "Studio"
$apartments = Apartment::withAnyTags(['Studio'], 'apartment_categories')->get();

// Tìm apartments ở "Sunset Town"
$apartments = Apartment::withAnyTags(['Sunset Town'], 'locations')->get();
```

---

## 🗂️ Cấu Trúc Database

### Bảng `tags`
- `id` - ID của tag
- `name` - Tên tag (ví dụ: "Phú Quốc")
- `slug` - Slug của tag
- `type` - Type của tag (`blog_tags`, `apartment_categories`, `locations`)
- `order_column` - Thứ tự sắp xếp

### Bảng `taggables`
- `tag_id` - ID của tag
- `taggable_id` - ID của model (post_id hoặc apartment_id)
- `taggable_type` - Type của model (`App\Models\Post` hoặc `App\Models\Apartment`)

---

## 🎨 Hiển Thị Tags trong Views

### **Blog Post View**

```blade
{{-- Hiển thị tags --}}
@if($post->tags->where('type', 'blog_tags')->count() > 0)
    <div class="tags">
        @foreach($post->tags->where('type', 'blog_tags') as $tag)
            <span class="tag">{{ $tag->name }}</span>
        @endforeach
    </div>
@endif
```

### **Apartment View**

```blade
{{-- Categories --}}
@if($apartment->categories->count() > 0)
    <div class="categories">
        @foreach($apartment->categories as $category)
            <span class="badge">{{ $category->name }}</span>
        @endforeach
    </div>
@endif

{{-- Locations --}}
@if($apartment->locationTags->count() > 0)
    <div class="locations">
        @foreach($apartment->locationTags as $location)
            <span class="location">{{ $location->name }}</span>
        @endforeach
    </div>
@endif
```

---

## 📚 Tài Liệu Tham Khảo

- [Filament Spatie Tags Plugin Documentation](https://filamentphp.com/plugins/filament-spatie-tags)
- [Spatie Laravel Tags Documentation](https://spatie.be/docs/laravel-tags)

---

## ✅ Checklist

- [x] Cài đặt plugin
- [x] Chạy migrations
- [x] Tạo Models với HasTags trait
- [x] Tạo Filament Resources với tag support
- [x] Cấu hình tags cho Blog Posts
- [x] Cấu hình categories và location tags cho Apartments

---

## 🚀 Next Steps

1. **Tạo sample data**: Thêm một số tags mẫu cho blog posts và apartments
2. **Tạo filters**: Thêm filters trong frontend để lọc theo tags
3. **SEO**: Sử dụng tags để tạo tag pages cho SEO
4. **Analytics**: Track xem tags nào được sử dụng nhiều nhất

---

**Lưu ý**: Plugin tự động được discover, không cần đăng ký trong `AdminPanelProvider`.

