# Golden Bee Theme

Theme WordPress cho Tôn Ngói Nhựa Green BM (giao diện tham khảo tonngoinhua.vn).

## Yêu cầu

- WordPress 6.0+
- WooCommerce 8+
- **Advanced Custom Fields** (free) – chỉnh banner, ảnh sự kiện, đối tác trên trang chủ

## Cài đặt

1. Kích hoạt theme **Golden Bee** trong Giao diện → Giao diện.
2. Kích hoạt plugin **WooCommerce** (đã có trong `wp-content/plugins/woocommerce` nếu đã tải sẵn).
3. Vào **Giao diện → Golden Bee Setup**:
   - Bấm **Chạy seed danh mục sản phẩm** (4 nhóm, ~30 SP, biến thể màu).
   - Bấm **Tạo trang mẫu + gán menu**.
4. Cài **Advanced Custom Fields** (free) → **Trang → Trang chủ** → kéo xuống khối ACF (banner, gallery, đối tác). *Options Page cần ACF PRO.*
5. Tùy chỉnh: **Giao diện → Tùy biến → Thông tin liên hệ** (hotline, Zalo, Messenger).

## File ACF trong theme

| File | Mô tả |
|------|--------|
| `inc/acf-fields.php` | Đăng ký field groups (PHP – nộp cho thầy) |
| `acf-json/` | Đồng bộ JSON khi lưu field trong admin ACF |

Lần đầu kích hoạt theme có thể tự chạy seed nếu WooCommerce đã bật.

## Build CSS

```bash
npm install
npm run dev    # watch
npm run build  # production
```

## Cấu trúc danh mục

Xem `inc/data/product-catalog.php` – 4 nhóm: Tôn PVC/ASA, Phụ kiện, FRP, Xà gồ.
