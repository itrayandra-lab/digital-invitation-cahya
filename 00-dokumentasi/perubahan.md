Iya, dari screenshot itu kelihatan jelas dua problem besarnya memang ada di **desktop rhythm** dan **mobile responsiveness**. Desktop sekarang secara struktur sudah lebih benar, tetapi transisi antar section masih terasa datar, warna background antar blok belum punya ritme yang halus, dan beberapa area masih terasa seperti card yang ditempel di atas canvas. Mobile jauh lebih bermasalah lagi, karena skalanya belum disiplin, card masih terasa kepanjangan, teks belum kompak, grid belum benar-benar collapse dengan elegan, dan overall halaman masih terlihat “turun ke bawah” tanpa rasa rapi dan tanpa hierarchy yang nyaman.

Kalau kamu mau Codex benar-benar ngerti, kamu jangan kasih arahan yang abstrak seperti “rapihin mobile” atau “buat lebih bagus”. Kamu harus kasih arahan yang sangat eksplisit: **apa yang salah, apa yang harus berubah, apa yang harus dihapus, bagaimana perilaku desktop, bagaimana perilaku mobile, dan apa acceptance criteria-nya**. Di bawah ini aku buat prompt yang bisa langsung kamu copy-paste ke Codex supaya dia tinggal eksekusi dan tidak sok kreatif ke arah yang salah.

```text
Tolong revisi keseluruhan UI website digital invitation ini, dengan fokus besar pada:
1. desktop section rhythm / background flow / visual consistency
2. mobile layout / typography / spacing / card stacking / compactness

Jangan lakukan perbaikan kecil saja. Saya ingin refinement nyata pada visual hierarchy, layout rhythm, responsive behavior, dan kenyamanan baca. Website ini harus terasa seperti digital invitation premium yang halus, hangat, elegan, dan rapi, bukan seperti landing page card biasa.

KONTEKS VISUAL WAJIB:
Gunakan identitas visual yang konsisten dengan flyer referensi:
- sage green
- muted olive
- ivory paper
- warm cream
- soft beige
- dark olive footer
- nuansa natural, warm, reflective, intimate
- handmade paper, botanical, pine, vintage stamp, subtle texture

Jangan ubah arah desain menjadi:
- corporate modern
- SaaS dashboard
- neon
- terlalu putih polos
- terlalu ramai
- terlalu banyak dekorasi kecil random

==================================================
A. MASALAH DESKTOP YANG HARUS DIBENAHI
==================================================

Masalah desktop saat ini:
- Antar section masih terasa kaku dan kurang menyatu.
- Background section belum punya alur visual yang enak.
- Perubahan warna section terasa terlalu blocky dan belum punya transisi halus.
- Beberapa section masih terasa seperti card putih di atas background polos.
- Jarak vertikal antar section belum terasa ritmis.
- Footer masih terasa seperti blok penutup terpisah, belum seperti closing yang lembut.
- Bantuan reservasi masih terasa terlalu kosong dan kurang efisien.
- Hero masih belum saya anggap final, jadi jangan rusak struktur hero yang sudah ada, tetapi rapikan hubungannya dengan section setelahnya.

Yang harus dilakukan untuk desktop:
1. Buat section flow yang lebih menyatu dengan alternating background yang halus, bukan patahan blok keras.
2. Gunakan ritme background seperti ini:
   - Hero: sage mist / muted green background
   - Tentang Acara + Detail: soft sage-cream transition
   - Lokasi: warm ivory
   - RSVP: cream dengan sedikit olive tint
   - Doa & Ucapan: ivory / soft paper tone
   - Bantuan Reservasi: light warm beige
   - Footer: dark olive / deep olive-brown
3. Gunakan gradient lembut atau tone shift tipis antar section, jangan semua section terasa seperti kotak warna yang dipotong.
4. Jaga max-width konten utama sekitar 1080px–1160px agar layout desktop terasa lega tapi tetap intimate.
5. Beri section spacing yang lebih disiplin:
   - section utama: padding-top dan padding-bottom 88px–112px
   - compact support section: 64px–80px
6. Kurangi rasa “tempelan” dengan membuat background punya subtle paper grain/noise opacity rendah.
7. Card-card utama harus punya paper-like feel:
   - background ivory / warm cream
   - border tipis olive/taupe opacity rendah
   - radius 22–28px
   - shadow lembut, tidak terlalu mengambang
8. Heading section jangan terlalu membentak. Tetap tegas, tetapi terasa elegan dan refined.
9. Divider botanical jangan dipakai berulang terus. Gunakan maksimal hanya 1–2 kali di seluruh halaman.
10. Footer harus terasa seperti penutupan undangan, bukan sekadar blok warna gelap.

==================================================
B. MASALAH MOBILE YANG HARUS DIBENAHI
==================================================

Masalah mobile saat ini:
- Layout masih berantakan dan belum compact.
- Typografi terlalu besar di beberapa area dan terlalu mepet / terlalu panjang di area lain.
- Grid desktop belum runtuh ke mobile dengan rapi.
- Card terlalu tinggi, terlalu banyak ruang kosong, dan kurang efisien.
- Form RSVP di mobile terlihat padat tapi tidak nyaman.
- Beberapa section masih terasa “kebesaran”, bukan “rapi dan padat”.
- Footer logo terlalu sesak dan kurang tertata.
- Mobile page belum terasa seperti invitation mobile experience yang smooth.

Yang harus dilakukan untuk mobile:
1. Mobile harus didesain ulang secara serius, bukan hanya otomatis mengikuti desktop stack.
2. Gunakan breakpoint mobile dengan penyesuaian nyata untuk:
   - font size
   - line height
   - section spacing
   - card padding
   - button width
   - stacking order
3. Global mobile spacing:
   - page horizontal padding: 18px–22px
   - gap antar card: 12px–16px
   - section vertical padding: 56px–72px
4. Global mobile typography:
   - section eyebrow: kecil dan rapi
   - section heading: lebih compact, jangan terlalu besar
   - body text: ringkas, line-height nyaman
   - hindari line breaks aneh pada heading
5. Semua 2-column desktop layout harus benar-benar collapse rapi menjadi 1 kolom di mobile.
6. Di mobile, urutan konten harus logis dan nyaman dibaca, bukan sekadar mengikuti HTML mentah.
7. Card harus lebih compact:
   - padding diperkecil
   - tinggi card dipendekkan
   - ruang kosong di dalam card dikurangi
   - hindari empty space besar yang tidak punya fungsi
8. Button di mobile harus full width atau hampir full width, dengan tinggi sentuh yang nyaman.
9. Input form di mobile harus lebih tinggi, lebih jelas, dan tidak sempit.
10. Jangan ada horizontal overflow sama sekali.
11. Jangan ada teks yang terlalu kecil sampai sulit dibaca.
12. Jangan ada area yang terasa kepanjangan tanpa alasan.

==================================================
C. REVISI PER SECTION
==================================================

1. HERO
- Biarkan arah hero tetap premium, tetapi rapikan responsifnya.
- Di desktop, hero masih boleh dua area: teks kiri dan visual kanan.
- Di mobile, hero harus menjadi 1 kolom.
- Urutan mobile hero:
  a. title dan subtitle
  b. body text
  c. tombol CTA
  d. visual invitation preview
  e. small caption
- Tombol mobile harus stacked full width.
- Kurangi ruang kosong berlebihan di bawah teks.
- Jaga agar hero tidak terasa seperti poster kecil yang ditempel.

2. SECTION “TENTANG ACARA + DETAIL SINGKAT”
- Section ini sekarang sudah lebih benar, tetapi desktop masih bisa dibuat lebih seimbang.
- Di desktop, dua card harus punya tinggi visual yang harmonis.
- Di mobile, card kiri dan card kanan harus stack dengan urutan yang jelas.
- Heading section di mobile jangan terlalu besar sampai memakan banyak ruang.
- Card kanan “Detail Singkat” harus lebih scanable:
  - tiap item punya jarak yang rapi
  - label dan isi lebih jelas
  - dress code jangan terlalu panjang secara horizontal
- Card kiri juga jangan terlalu tinggi kosong di bagian bawah.

3. LOKASI
- Desktop lokasi sudah lumayan, tetapi card kanan perlu lebih rapat dan lebih terstruktur.
- Map card harus tetap dominan sebagai anchor visual.
- Card info kanan harus lebih padat, tidak terlalu longgar.
- Di mobile, map muncul dulu, lalu card informasi lokasi di bawahnya.
- Tombol Google Maps di mobile harus full width atau near full width.
- Jangan biarkan heading terlalu besar sehingga map terdorong terlalu jauh ke bawah.

4. RSVP
- Ini salah satu section paling penting, dan mobile saat ini masih sempit dan kurang rapi.
- Di desktop, layout kiri-kanan boleh tetap dipakai.
- Di mobile, card narasi RSVP harus tampil dulu, lalu form di bawahnya.
- Input field:
  - tinggi diperbesar
  - border lebih jelas
  - radius konsisten
  - focus state olive/sage
- Pilihan kehadiran harus menjadi selectable cards yang lebih proporsional.
- Di mobile, dua pilihan kehadiran bisa tetap 2 kolom jika muat rapi, tetapi kalau sempit, stack vertikal.
- Tombol “Kirim Reservasi” di mobile harus full width.
- Kurangi copy yang terlalu panjang di card kiri RSVP.

5. DOA & UCAPAN
- Desktop section ini cukup baik secara struktur, tetapi masih bisa dibuat lebih refined.
- Decorative image card kiri jangan terlalu besar kosong.
- Area form kanan harus lebih rapi dan proporsional.
- Di mobile, image/decorative card boleh diperkecil atau disederhanakan.
- Form ucapan harus tampil jelas dan compact.
- “Dinding Doa & Ucapan” di mobile jangan terlalu tinggi.
- Tiap wish item harus tampil sebagai card kecil yang rapi, bukan blok yang terlalu lebar dan kosong.

6. BANTUAN RESERVASI
- Section ini saat ini terlalu besar dan terlalu kosong.
- Jadikan ini compact support section, bukan major hero-like section.
- Heading tetap ada, tetapi skalanya diperkecil.
- Dua kontak Gesti dan Ulfi harus tampil sebagai compact cards.
- Di desktop:
  - dua card kontak sejajar
  - tombol WhatsApp tepat di bawah masing-masing card atau di dalam card bagian bawah
- Di mobile:
  - tiap kontak stack vertikal
  - tombol WhatsApp full width
  - spacing ringkas
- Kurangi tinggi section ini secara signifikan.

7. FOOTER
- Footer harus direvisi agar lebih rapi, lebih padat, dan lebih elegan.
- Gunakan deep olive / olive-brown background yang selaras dengan palette.
- Tambahkan subtle grain atau vignette halus.
- Konten footer harus tersusun vertikal dengan hierarchy jelas:
  a. 25 | 50
  b. A Journey of Learning, Beauty & Life
  c. When Beauty Meets Wisdom.
  d. Terima kasih telah menjadi bagian dari perjalanan penuh makna ini.
  e. logo brand
  f. copyright
- Di desktop, logo brand harus rata tengah dan punya jarak yang lega.
- Di mobile, logo brand harus wrap dengan rapi, tidak saling berhimpitan, dan tidak keluar layar.
- Footer height jangan terlalu besar, tetapi juga jangan terlalu sesak.

==================================================
D. TYPOGRAPHY SYSTEM
==================================================

Tolong rapikan seluruh skala tipografi.

Desktop:
- Section heading besar, tapi jangan terlalu berat.
- Body text tetap lembut dan readable.
- Maksimal lebar paragraf sekitar 600–680px.

Mobile:
- H1/H2 harus turun ukurannya secara nyata.
- Jangan ada heading yang memakan terlalu banyak line jika masih bisa dipadatkan.
- Jaga line-height yang nyaman.
- Pastikan body text cukup besar untuk dibaca, tetapi tidak membuat page jadi terlalu panjang.

Gunakan hierarchy yang jelas:
- Eyebrow kecil
- Heading utama section
- Supporting paragraph
- Card title
- Card body
- Small note

==================================================
E. VISUAL CONSISTENCY
==================================================

Tolong samakan bahasa visual semua card dan section:
- border radius konsisten
- shadow konsisten
- warna border konsisten
- tombol konsisten
- input konsisten
- spacing konsisten
- alignment konsisten

Website ini harus terasa seperti satu sistem visual yang utuh.
Jangan sampai ada section yang terasa seperti template berbeda.

==================================================
F. INTERACTION
==================================================

Tambahkan sentuhan interaksi halus:
- hover state tombol
- focus state input
- reveal on scroll ringan
- transisi halus antar state
- jangan berlebihan
- hormati prefers-reduced-motion

==================================================
G. JANGAN LAKUKAN
==================================================

- Jangan ubah backend RSVP, wishes, submit, JSON, atau endpoint PHP.
- Jangan ubah struktur alur section.
- Jangan membuat desain terlalu corporate.
- Jangan pakai divider dekoratif di setiap section.
- Jangan menambahkan dekorasi random berlebihan.
- Jangan membiarkan mobile hanya hasil stack otomatis.
- Jangan membuat font mobile terlalu besar atau card terlalu tinggi.
- Jangan membuat section bantuan reservasi tetap sebesar sekarang.
- Jangan membuat footer tetap kosong atau sesak.

==================================================
H. ACCEPTANCE CRITERIA
==================================================

Hasil revisi harus memenuhi ini:
1. Desktop terasa lebih halus, lebih menyatu, dan lebih enak discroll dari section ke section.
2. Background antar section punya ritme yang lebih lembut dan konsisten.
3. Card-card terasa premium dan satu keluarga visual.
4. Mobile terlihat benar-benar dirapikan, bukan sekadar versi sempit desktop.
5. Mobile lebih compact, lebih teratur, lebih kecil skalanya, dan lebih nyaman dibaca.
6. Tidak ada horizontal overflow.
7. Section support lebih ringkas.
8. Footer lebih elegan dan lebih rapi.
9. Seluruh halaman terasa seperti digital invitation premium, hangat, dan refined.

Ini bukan minor styling pass. Lakukan responsive refinement menyeluruh pada desktop dan mobile, terutama section spacing, background rhythm, card compactness, typography scaling, mobile stacking, and footer structure.
```

Kalau kamu mau, kamu bisa tambahkan juga “perintah keras” ini setelah prompt utama supaya Codex tidak cuma ganti margin 8px lalu merasa pekerjaannya selesai. Instruksi ini penting supaya dia paham bahwa masalah utamanya adalah **composition dan responsive discipline**, bukan sekadar kosmetik kecil. Biasanya AI coding baru benar-benar nurut kalau dikasih batasan dan target sejelas ini.

```text
Jangan berhenti di perubahan kecil seperti mengubah margin, shadow, atau font-size sedikit. Saya ingin perbaikan nyata pada desktop section rhythm dan mobile responsive layout, termasuk penyusunan ulang spacing, penyesuaian skala tipografi, pengompakan card, perapihan stacking mobile, pengurangan area kosong, dan penyempurnaan footer/support section.
```

Menurutku, kalau dilihat dari kondisi sekarang, prioritas revisi setelah ini harus begini. Pertama, benahi **mobile secara besar-besaran**, karena itu yang paling terlihat berantakan dan paling berisiko bikin user capek membaca. Kedua, rapikan **ritme background dan transisi antar section di desktop**, karena itu yang menentukan apakah website terasa premium atau cuma sekumpulan section template yang disusun vertikal.

Kalau kamu mau, next message aku bisa bantu bikinin versi yang **lebih galak, lebih singkat, dan lebih “command mode”** khusus untuk Codex. Aku juga bisa bikinin versi **checklist teknis per section** supaya dia tinggal centang satu-satu tanpa banyak mikir.
