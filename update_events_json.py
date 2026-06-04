import json
from pathlib import Path

path = Path('acf-json/group_goldenbee_events.json')
data = json.loads(path.read_text(encoding='utf-8'))
base_fields = [f for f in data['fields'][:2]]
for i in range(1, 51):
    base_fields.append({
        'key': f'field_gb_evt_event_image_{i}',
        'label': f'Ảnh sự kiện {i}',
        'name': f'event_image_{i}',
        'aria-label': '',
        'type': 'image',
        'instructions': 'Chọn hoặc upload ảnh sự kiện có chất lượng rõ nét để hiển thị đúng khung hình.',
        'required': False,
        'conditional_logic': False,
        'wrapper': {'width': '', 'class': '', 'id': ''},
        'return_format': 'array',
        'preview_size': 'medium',
        'library': 'all',
        'mime_types': 'jpg,jpeg,png,webp',
        'min_width': 0,
        'min_height': 0,
        'min_size': 0,
        'max_width': 0,
        'max_height': 0,
        'max_size': 0,
    })
for f in base_fields:
    if f.get('type') == 'message':
        f['message'] = 'Upload tối đa 50 ảnh sự kiện để hiển thị đầy đủ bộ sưu tập trên trang chủ.'
        break

data['fields'] = base_fields
path.write_text(json.dumps(data, ensure_ascii=False, indent=4) + '\n', encoding='utf-8')
print('Updated', path, 'with', len(data['fields']), 'fields')
