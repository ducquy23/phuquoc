# SEO Strategy - Phú Quốc Website

## 🎯 Mục Tiêu

Website cho **kinh doanh riêng lẻ** - tập trung vào:
1. ✅ **SEO tốt** - Ranking cao trên Google
2. ✅ **Liên hệ đơn giản** - Chỉ cần số điện thoại
3. ✅ **Content Marketing** - Blog posts về Phú Quốc
4. ✅ **Local SEO** - Tối ưu cho tìm kiếm địa phương

---

## 📊 Database Schema - Tối Ưu SEO

### 1. **Apartments Table** - SEO Fields

```php
// Basic SEO
- meta_title
- meta_description
- meta_keywords (JSON)

// Advanced SEO
- og_image_url (Open Graph image)
- schema_markup (JSON-LD structured data)
- canonical_url
- noindex, nofollow flags
```

**Schema Markup cho Apartment:**
```json
{
  "@context": "https://schema.org",
  "@type": "Apartment",
  "name": "18th Floor Sunset Town Phu Quoc",
  "description": "...",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Phu Quoc",
    "addressRegion": "Kien Giang",
    "addressCountry": "VN"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": "10.2899",
    "longitude": "103.9840"
  },
  "offers": {
    "@type": "Offer",
    "price": "732",
    "priceCurrency": "USD"
  }
}
```

### 2. **Posts Table** - SEO Fields

```php
// Basic SEO
- meta_title
- meta_description
- meta_keywords (JSON)
- focus_keyword (Primary keyword)

// Advanced SEO
- og_image_url
- schema_markup (Article schema)
- canonical_url
- noindex, nofollow
```

**Schema Markup cho Blog Post:**
```json
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "Why Sunset Town is the Best Place for Long-Term Rentals",
  "author": {
    "@type": "Person",
    "name": "Alex Nguyen"
  },
  "datePublished": "2024-10-24",
  "image": "...",
  "publisher": {
    "@type": "Organization",
    "name": "PQ Rentals"
  }
}
```

### 3. **Pages Table** - SEO Fields

Tương tự như Posts, hỗ trợ:
- Landing pages với SEO tối ưu
- SEO pages (như `/phu-quoc-long-term-rentals`)
- Custom meta tags

### 4. **Contacts Table** - Đơn Giản Hóa

```php
- phone (REQUIRED) - Số điện thoại chính
- name
- email (optional)
- zalo (optional) - Zalo ID
- inquiry_type (booking, question, general)
- preferred_check_in, preferred_check_out, preferred_guests
```

**Không cần booking system phức tạp** - chỉ cần form liên hệ với số điện thoại.

---

## 🔍 SEO Best Practices

### 1. **Keyword Research**

**Primary Keywords:**
- `phu quoc apartment rental`
- `phu quoc long term rental`
- `phu quoc monthly rental`
- `thue can ho phu quoc`
- `thue nha phu quoc dai han`
- `sunset town phu quoc rental`

**Long-tail Keywords:**
- `best apartments in phu quoc for rent`
- `phu quoc apartment with ocean view`
- `monthly rental phu quoc island`
- `phu quoc apartment near beach`

### 2. **Content Strategy**

**Blog Posts Topics:**
1. **Apartment Hunting**
   - "Top 5 Luxury Apartments with Ocean Views in Phu Quoc"
   - "How to Find the Best Long-Term Rental in Phu Quoc"
   - "Sunset Town vs An Thoi: Which is Better for Rentals?"

2. **Local Life**
   - "Living in Phu Quoc: A Digital Nomad's Guide"
   - "Best Coffee Shops in Phu Quoc for Remote Workers"
   - "Phu Quoc Cost of Living: Complete Guide 2024"

3. **Travel Tips**
   - "Best Beaches in Phu Quoc for Long-Term Visitors"
   - "Phu Quoc Visa Guide: How to Stay Long-Term"
   - "Transportation in Phu Quoc: Getting Around the Island"

4. **Legal & Visa**
   - "Vietnam Visa for Long-Term Stays: Complete Guide"
   - "Renting in Phu Quoc: Legal Requirements"
   - "Work Permit in Vietnam: What You Need to Know"

### 3. **On-Page SEO**

**Mỗi Apartment:**
- ✅ Unique meta title (60-70 chars)
- ✅ Compelling meta description (150-160 chars)
- ✅ Focus keyword trong title và description
- ✅ Schema markup (Apartment schema)
- ✅ Alt text cho tất cả images
- ✅ Internal links đến related apartments
- ✅ Canonical URL

**Mỗi Blog Post:**
- ✅ Unique meta title với focus keyword
- ✅ Meta description hấp dẫn
- ✅ Article schema markup
- ✅ Table of contents (nếu bài dài)
- ✅ Internal links đến apartments và other posts
- ✅ External links đến authoritative sources

**Landing Pages:**
- ✅ `/phu-quoc-long-term-rentals` - Tối ưu cho "long term rental phu quoc"
- ✅ `/phu-quoc-monthly-rentals` - Tối ưu cho "monthly rental phu quoc"
- ✅ `/phu-quoc-apartments-for-rent` - Tối ưu cho "apartments for rent phu quoc"

### 4. **Technical SEO**

**Sitemap:**
- Tự động generate sitemap.xml
- Include: apartments, posts, pages
- Priority và changefreq

**Robots.txt:**
```
User-agent: *
Allow: /
Disallow: /admin/
Disallow: /api/
Sitemap: https://yourdomain.com/sitemap.xml
```

**Page Speed:**
- Optimize images (WebP format)
- Lazy loading images
- Minify CSS/JS
- CDN cho static assets

**Mobile-First:**
- Responsive design
- Fast mobile loading
- Touch-friendly buttons

### 5. **Local SEO**

**Google Business Profile:**
- Tạo Google Business Profile
- Thêm địa chỉ, số điện thoại
- Thêm photos
- Collect reviews

**Local Schema Markup:**
```json
{
  "@type": "LocalBusiness",
  "name": "PQ Rentals",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Phu Quoc",
    "addressRegion": "Kien Giang"
  },
  "telephone": "+84902607024"
}
```

**NAP Consistency:**
- Name, Address, Phone phải consistent trên:
  - Website
  - Google Business
  - Social media
  - Directory listings

### 6. **Content Optimization**

**Apartment Descriptions:**
- Minimum 300 words
- Include keywords naturally
- Highlight unique features
- Include location details
- Add amenities list

**Blog Posts:**
- Minimum 1000 words
- Use H2, H3 headings
- Include images với alt text
- Internal linking
- Call-to-action (CTA) để contact

---

## 📱 Contact Strategy - Đơn Giản

### Contact Form Fields:
1. **Name** (required)
2. **Phone** (required) - Số điện thoại chính
3. **Email** (optional)
4. **Zalo** (optional) - Popular in Vietnam
5. **Inquiry Type**: Booking, Question, General
6. **Message** (optional)
7. **Preferred Dates** (if booking)

### Display Phone Number:
- ✅ Prominent trên mọi page
- ✅ Click-to-call trên mobile
- ✅ WhatsApp/Zalo links
- ✅ Sticky phone button

### Response Strategy:
- Auto-responder: "Cảm ơn bạn đã liên hệ. Chúng tôi sẽ gọi lại trong vòng 24h."
- Track trong admin panel
- Mark as "replied" sau khi gọi

---

## 🚀 Filament Plugins Cho SEO

### Essential:
1. **Filament SEO** (nếu có) hoặc custom SEO fields
2. **Spatie Tags** - Cho categories và tags
3. **Curator** - Image management với alt text

### Recommended:
4. **Filament Spatie Sitemap** - Auto generate sitemap
5. **Filament Google Analytics** - Track traffic

---

## 📈 SEO Checklist

### Setup:
- [ ] Google Search Console
- [ ] Google Analytics
- [ ] Google Business Profile
- [ ] Sitemap.xml
- [ ] Robots.txt
- [ ] Schema markup cho tất cả content types

### Content:
- [ ] 10+ blog posts về Phú Quốc
- [ ] 20+ apartment listings với descriptions
- [ ] 5+ SEO landing pages
- [ ] Internal linking structure

### Technical:
- [ ] Page speed optimization
- [ ] Mobile responsiveness
- [ ] SSL certificate
- [ ] 404 page
- [ ] Canonical URLs

### Local SEO:
- [ ] Google Business Profile
- [ ] NAP consistency
- [ ] Local keywords trong content
- [ ] Location pages (Sunset Town, An Thoi, etc.)

---

## 🎯 Priority Actions

1. **Week 1-2:**
   - Setup SEO fields trong database
   - Tạo 5-10 apartment listings với SEO
   - Tạo 3-5 blog posts

2. **Week 3-4:**
   - Tối ưu technical SEO
   - Setup Google Search Console
   - Tạo landing pages

3. **Month 2:**
   - Content marketing (10+ blog posts)
   - Build backlinks
   - Local SEO optimization

---

## 📞 Contact Optimization

**Phone Number Display:**
```html
<!-- Sticky phone button -->
<a href="tel:+84902607024" class="fixed bottom-4 right-4 bg-green-500 text-white rounded-full p-4 shadow-lg">
  <span class="material-icons">phone</span>
</a>

<!-- Click to call -->
<a href="tel:+84902607024">+84 902-607-024</a>

<!-- WhatsApp -->
<a href="https://wa.me/84902607024">WhatsApp</a>

<!-- Zalo -->
<a href="https://zalo.me/0902607024">Zalo</a>
```

**Schema Markup cho Contact:**
```json
{
  "@type": "ContactPoint",
  "telephone": "+84902607024",
  "contactType": "customer service",
  "areaServed": "VN",
  "availableLanguage": ["Vietnamese", "English"]
}
```

---

## ✅ Summary

**Database Changes:**
- ✅ Enhanced SEO fields (og_image, schema_markup, canonical_url)
- ✅ Simplified contacts (phone required, no complex booking)
- ✅ Focus keyword field
- ✅ Noindex/Nofollow flags

**SEO Focus:**
- ✅ Local SEO (Phú Quốc)
- ✅ Long-tail keywords
- ✅ Content marketing (blog)
- ✅ Schema markup
- ✅ Technical SEO

**Contact:**
- ✅ Phone-first approach
- ✅ Simple contact form
- ✅ Zalo/WhatsApp support
- ✅ No complex booking system

