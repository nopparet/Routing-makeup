<?php

namespace App\Http\Controllers; // กำหนด namespace ของ Controller เพื่อจัดการโครงสร้างไฟล์

use App\Models\Chirp; // นำเข้าโมเดล Chirp สำหรับใช้งานกับฐานข้อมูล
use Illuminate\Http\RedirectResponse; // นำเข้าคลาสสำหรับ Response ที่เป็นการ Redirect
use Illuminate\Http\Request; // นำเข้าคลาสสำหรับจัดการคำขอ (HTTP Request)
use Illuminate\Support\Facades\Gate; // นำเข้าฟาซาด Gate สำหรับตรวจสอบสิทธิ์
use Inertia\Inertia; // นำเข้าฟาซาด Inertia สำหรับเชื่อม Laravel กับ Frontend
use Inertia\Response; // นำเข้าคลาส Response สำหรับตอบกลับในรูปแบบ Inertia

class ChirpController extends Controller // สร้างคลาส Controller สำหรับจัดการฟังก์ชันที่เกี่ยวข้องกับ Chirps
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response // แสดงรายการ Chirps ทั้งหมด
    {
        return Inertia::render('Chirps/Index', [ // ใช้ Inertia เพื่อเรนเดอร์ View ในโฟลเดอร์ Chirps/Index
            'chirps' => Chirp::with('user:id,name')->latest()->get(), // ดึงข้อมูล Chirps พร้อมความสัมพันธ์กับ user เฉพาะ id และ name
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() // แสดงฟอร์มสำหรับสร้าง Chirp ใหม่ (ยังไม่ได้ใช้งาน)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse // บันทึกข้อมูล Chirp ใหม่ลงในฐานข้อมูล
    {
        $validated = $request->validate([ // ตรวจสอบข้อมูลที่ส่งมาว่าตรงตามเงื่อนไข
            'message' => 'required|string|max:255', // message เป็นข้อความที่จำเป็นและมีความยาวไม่เกิน 255 ตัวอักษร
        ]);
 
        $request->user()->chirps()->create($validated); // สร้าง Chirp ใหม่โดยผูกกับผู้ใช้งานที่ล็อกอินอยู่
 
        return redirect(route('chirps.index')); // เปลี่ยนเส้นทางไปยังหน้ารายการ Chirps
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp) // แสดง Chirp ที่ระบุ (ยังไม่ได้ใช้งาน)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp) // แสดงฟอร์มแก้ไข Chirp ที่ระบุ (ยังไม่ได้ใช้งาน)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp): RedirectResponse // อัปเดตข้อมูลของ Chirp ที่ระบุ
    {
        Gate::authorize('update', $chirp); // ตรวจสอบสิทธิ์ว่าผู้ใช้สามารถอัปเดต Chirp นี้ได้หรือไม่
 
        $validated = $request->validate([ // ตรวจสอบข้อมูลที่ส่งมาว่าตรงตามเงื่อนไข
            'message' => 'required|string|max:255', // message เป็นข้อความที่จำเป็นและมีความยาวไม่เกิน 255 ตัวอักษร
        ]);
 
        $chirp->update($validated); // อัปเดตข้อมูล Chirp ในฐานข้อมูล
 
        return redirect(route('chirps.index')); // เปลี่ยนเส้นทางไปยังหน้ารายการ Chirps
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp): RedirectResponse // ลบ Chirp ที่ระบุออกจากฐานข้อมูล
    {
        Gate::authorize('delete', $chirp); // ตรวจสอบสิทธิ์ว่าผู้ใช้สามารถลบ Chirp นี้ได้หรือไม่
 
        $chirp->delete(); // ลบ Chirp ออกจากฐานข้อมูล
 
        return redirect(route('chirps.index')); // เปลี่ยนเส้นทางไปยังหน้ารายการ Chirps
    }
}
