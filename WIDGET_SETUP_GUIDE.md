# Hướng dẫn Cài đặt Widget Bài Viết

## Các thay đổi đã hoàn thành:

### 1. Chỉnh sửa giao diện bài viết
- ✅ Kích thước ảnh: Tối ưu hóa aspect-ratio (4:3)
- ✅ Tiêu đề: Giới hạn 2 dòng với `line-clamp-2`
- ✅ Nội dung: Cấu trúc card cố định 160px cho phần text
- ✅ Button "Xem ngay": Style trắng, nền màu xanh (brand), hover hiệu ứng

### 2. Layout 2 cột
- ✅ Cột chính (lg:col-span-2): Grid 2 cột cho bài viết
- ✅ Sidebar phải (lg:col-span-1): Widget area

### 3. CSS Widgets
- ✅ Search Widget: Có ô tìm kiếm + nút search
- ✅ Category Widget: Danh sách danh mục với icon
- ✅ Featured Posts Widget: Widget bài viết nổi bật custom

## Cách Thêm Widget:

### Bước 1: Vào WordPress Admin
1. Đăng nhập vào WordPress Dashboard
2. Vào **Appearance (Giao diện)** → **Widgets (Widget)**

### Bước 2: Thêm các Widget vào "Archive Sidebar"
Bạn sẽ thấy khu vực mới gọi là **"Archive Sidebar"** - đây là sidebar cho trang bài viết

Thêm 3 widget sau theo thứ tự:

#### **Widget 1: Search (Tìm kiếm)**
- Tên: "Search" (Tìm kiếm)
- Cách thêm: Kéo widget "Search" vào "Archive Sidebar"
- Không cần cấu hình thêm

#### **Widget 2: Categories (Danh mục)**
- Tên: "Categories" (Danh mục)
- Cách thêm: Kéo widget "Categories" vào "Archive Sidebar"
- Tùy chọn:
  - Hiển thị số bài viết: ✓ (Tích)
  - Hiển thị hình phân cấp: ✓ (Tích nếu muốn)

#### **Widget 3: Featured Posts (Bài viết nổi bật)**
- Tên: "Golden Bee - Bài viết nổi bật" (Widget custom)
- Cách thêm: Kéo widget này vào "Archive Sidebar"
- Tùy chọn:
  - Tiêu đề: "Bài viết nổi bật" (có thể sửa)
  - Số bài viết: 5 (có thể tăng/giảm)

## CSS Classes để tùy chỉnh:

```css
.widget-title          /* Tiêu đề widget */
.widget_search         /* Container tìm kiếm */
.widget_categories     /* Container danh mục */
.featured-posts-widget /* Widget bài viết nổi bật */
```

## Lưu ý:

1. **Responsive**: Layout tự động điều chỉnh trên mobile (sidebar sẽ hiển thị dưới cùng)
2. **Colors**: Tất cả sử dụng brand color (#003481) và secondary color (#6bca1e)
3. **Featured Posts**: Hiển thị các bài viết có meta `_featured = 1`. Bạn có thể thêm field ACF hoặc checkbox để đánh dấu bài viết nổi bật
4. **Button**: "Xem ngay" có hover effect và padding cân đối

## Nếu cần sửa CSS:

1. Chỉnh sửa file: `src/input.css`
2. Tìm phần "/* Widget Styles */"
3. Sửa CSS cho widget tương ứng
4. Chạy lệnh build: `npm run build`

---

**Hoàn thành!** 🎉 Bây giờ hãy vào WordPress Admin để thêm các widget vào sidebar.
