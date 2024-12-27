<?php

namespace App\Http\Controllers;

use App\Models\id;
use Inertia\Inertia;    
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     private $products = [
        ['id' => 1, 'name' => 'Cathy Doll นอตทูแมทท์ลิป 2.9g เคที่ดอลล์', 'description' => 'ลิปเนื้อกึ่งแมทท์ให้ฟินิชริมฝีปากแมทท์พร้อมคงความชุ่มชื้น ไม่ทำให้ปากแห้ง มอบสัมผัสริมฝีปากที่เนียนลื่น เบาสบาย เนื้อลิปสีพิกเมนต์แน่นปาดเดียวสีชัด เบลอร่องริมฝีปากให้ดูอวบอิ่ม','price' => 300 , 
        'image' => 'https://online.karmarts.com/media/catalog/product/cache/2/image/767x767/9df78eab33525d08d6e5fb8d27136e95/n/o/not_to_matte_lip_01_peek_a_boo_25_.jpg'],

        ['id' => 2, 'name' => 'Lip it อัมเบรลลาซันบาล์ม เอสพีเอฟ50+ พีเอ++++ 8g ลิปอิท', 'description' => 'แดดแรงแบบนี้ต้องกางร่ม! ปกป้องริมฝีปากของคุณจากการถูกทำร้ายจากแสงแดดด้วย ลิปอิท อัมเบรลลา ซันบาล์ม SPF50+ PA++++ สูตรซูทติ้ง ด้วยค่าการปกป้องแสงแดดสูง ช่วยปกป้องผิวได้ถึง 98% ช่วยปกป้องริมฝีปากจากการสูญเสียความชุ่มชื้นและความหมองคล้ำ ผสานคุณค่าการบำรุงด้ว', 'price' => 200, 
        'image' => 'https://online.karmarts.com/media/catalog/product/cache/2/image/1800x/040ec09b1e35df139433887a97daa66f/a/r/artboard_1_copy_6-100_15.jpg'],

        ['id' => 3, 'name' => 'Cathy Doll บิ๊กแบร์เจลลี่บาล์ม 5g เคที่ดอลล์', 'description' => 'ลิปหมีใหญ่ เนื้อคริสตัลเจลลี่มาในแพ็กเกจถุงขนมสีสันน่ารักสดใส แต่งเติมริมฝีปากและพวงแก้มให้มีสีระเรื่อ วาวสวยเป็นธรรมชาติ เนื้อบาล์มสัมผัสลื่น เกลี่ยง่าย เบาสบายผิว ไม่เหนียวเหนอะหนะ ทิ้งสเตนสีชัด ติดทน กันน้ำ กันเหงื่อ', 'price' => 250, 
        'image' => 'https://online.karmarts.com/media/catalog/product/cache/2/image/767x767/9df78eab33525d08d6e5fb8d27136e95/a/w/aw_cathy_doll_big_bear_jelly_balm01.jpg'],

       ['id' => 4, 'name' => 'Baby Bright แบริเออร์แมทท์ลิปคลิก 1.4g เบบี้ไบร์ท', 'description' => 'แค่กดก็เนรมิตเรียวปากแมทท์สวยนุ่มด้วย เบบี้ไบร์ท แบริเออร์แมทท์ลิปคลิก เนื้อ Semi-matte ที่ช่วยเพิ่มความชุ่มชื้นให้ริมฝีปาก สัมผัสนุ่ม เนียนลื่น มอบสีชัดติดทน กลบสีปากได้อย่างแนบสนิท ไม่ตกร่อง', 'price' => 220, 
       'image' => 'https://online.karmarts.com/media/catalog/product/cache/2/image/767x767/9df78eab33525d08d6e5fb8d27136e95/a/w/aw_baby-bright-barrier-matte-lip-click1.jpg'],

       ['id' => 5, 'name' => 'THA บลิงบลิงชิมเมอร์ดับเบิ้ลลิปวอลลุ่ม 2g ฑาบายน้องฉัตร', 'description' => 'ลิปดับเบิ้ลวอลลุ่มเนื้อฉ่ำวาวปากอิ่มฟูขั้นสุดผสมเนื้อชิมเมอร์ แต่งแต้มริมฝีปากให้ดูฉ่ำวาวเปล่งประกายเย้ายวน เรียวปากแวววาว มีประกายสวยโดดเด่น', 'price' => 229, 
       'image' => 'https://online.karmarts.com/media/catalog/product/cache/2/image/1800x/040ec09b1e35df139433887a97daa66f/a/w/aw-bling_bling_shimmer_double_lip_volume-01.jpg'],

       ['id' => 6, 'name' => 'Cathy Doll คัฟเวอร์แมทท์คอนซีลเลอร์ 2.4g เคที่ดอลล์', 'description' => 'คอนซีลเลอร์เนื้อครีมสูตรแมทท์ป้องกันสิว ให้การปกปิดระดับสูง ทั้งริ้วรอยเฉพาะจุด รอยคล้ำใต้ตา รวมไปถึงสีผิวที่ไม่สม่ำเสมอให้สว่าง แลดูมีมิติ สามารถเกลี่ยทาได้ง่ายแต่ให้การปกปิดอย่างเต็มขั้น', 'price' => 180, 
       'image' => 'https://online.karmarts.com/media/catalog/product/cache/2/image/1800x/040ec09b1e35df139433887a97daa66f/c/a/cathy_doll_cover_matte_concealer_01_11.jpg'],

       ['id' => 7, 'name' => 'Cathy Doll คัฟเวอร์แมทท์พาวเดอร์แพ็ค เอสพีเอฟ30 พีเอ+++ 12g เคที่ดอลล์ แป้งซ่อนผิว', 'description' => 'แป้งผสมรองพื้นเนื้อแมทท์ ปกปิดผิวประดุจผิวจริง ปรับผิวให้สม่ำเสมอ มาพร้อมสารปกป้องผิวจากแสงแดดด้วย SPF30 PA+++ เนื้อสัมผัสสบายผิว แมทท์ยาวนานตลอดทั้งวัน ผิวสวยสมบูรณ์อย่างไร้ที่ติ คุมมัน กันน้ำ กันเหงื่อ ลดการเกิดสิว บำรุงผิวให้ชุ่มชื้น', 'price' => 150, 
       'image' => 'https://online.karmarts.com/media/catalog/product/cache/2/image/1800x/040ec09b1e35df139433887a97daa66f/c/a/cathy_doll_cover_matte_powder_pact_spf30_pa_12g_01_1.jpg'],

       ['id' => 8, 'name' => 'Cathy Doll วิทซีวอเตอร์ทินท์ 2.7g เคที่ดอลล์', 'description' => 'เรียวปากสวยสดใสด้วย เคที่ดอลล์ วิทซี วอเตอร์ ทินท์ ลิปทินท์น้ำแร่ เกลี่ยง่าย เบาสบายไม่เหนียวเหนอะหนะ สีชัด ติดทนนานตลอดวัน พร้อมบำรุงขั้นสุดด้วยวิตามินซีเข้มข้น', 'price' => 200, 
       'image' => 'https://online.karmarts.com/media/catalog/product/cache/2/image/1800x/040ec09b1e35df139433887a97daa66f/d/e/detail_4_8.jpg '],

       ['id' => 9, 'name' => 'Browit อะเวคคาเฟอีนอายบราวมาสคาร่า 4g บราวอิท', 'description' => 'มาสคาร่าปัดคิ้วเนื้อครีม ช่วยปลุกคิ้วที่ดูตกให้คิ้วตื่น ตั้งฟูขั้นสุด พร้อมปรับสีคิ้วให้เข้ากับสีผม ด้วยหัวแปรงแบบ 2 in 1 Curl Shaped สามารถปัดได้ทั้ง 2 ด้านด้านแปรงสั้น ปัดเพื่อเคลือบสีขนคิ้วให้ทั่วถึงทุกเส้น ด้านแปรงยาวโค้ง ปัดเพื่อจัดแต่งและยกขนคิ้วให้', 'price' => 250, 
       'image' => 'https://online.karmarts.com/media/catalog/product/cache/2/image/1800x/040ec09b1e35df139433887a97daa66f/a/w/aw-webdetail-awake-caffeine-eyebrow-mascara-01.jpg'],

       ['id' => 10, 'name' => 'BROWIT อายแชโดว์พาเลท 1G X 4สี', 'description' => 'พาเลทอายแชโดว์ที่ออกแบบโดยน้องฉัตร นักแต่งหน้า ประเทศไทย ช่วยเติมเต็มสีสันให้เปลือกตาสวยสดใส ประกอบไปด้วยเนื้อแมทท์และชิมเมอร์ เนื้อแน่น เนียนละเอียด ติดทน เกลี่ยง่าย เม็ดสีสวย', 'price' => 330, 
       'image' => 'https://online.karmarts.com/media/catalog/product/cache/2/image/1800x/040ec09b1e35df139433887a97daa66f/e/y/eyeshadow_palatte_rose_peach_20__1.jpg'],
        ];  
    public function index()
    {
        return Inertia::render('Products/Index', ['products' => $this->products]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    $product = collect($this->products)->firstWhere('id', $id);
    if (!$product) {
    abort(404, 'Product not found');
    }
    return Inertia::render('Products/Show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
