import React from 'react'; // นำเข้า React สำหรับสร้าง UI components
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout'; // ใช้ Layout สำหรับผู้ที่ล็อกอินแล้ว
import Chirp from '@/Components/Chirp'; // Component สำหรับแสดง Chirp แต่ละรายการ
import InputError from '@/Components/InputError'; // Component สำหรับแสดงข้อผิดพลาดของ input
import PrimaryButton from '@/Components/PrimaryButton'; // ปุ่มหลักสำหรับการกระทำ
import { useForm, Head } from '@inertiajs/react'; // Inertia.js hooks สำหรับจัดการฟอร์มและส่วนหัวของหน้า

export default function Index({ auth, chirps }) { // ฟังก์ชัน component สำหรับหน้า Chirps โดยรับ props: auth และ chirps
    const { data, setData, post, processing, reset, errors } = useForm({ // ใช้ useForm สำหรับจัดการข้อมูลฟอร์ม
        message: '', // กำหนดค่าเริ่มต้นของ message เป็นค่าว่าง
    });

    const submit = (e) => { // ฟังก์ชันสำหรับจัดการการ submit ฟอร์ม
        e.preventDefault(); // ป้องกันการ reload หน้า
        post(route('chirps.store'), { onSuccess: () => reset() }); // ส่งข้อมูลไปยัง route 'chirps.store' และ reset ฟอร์มเมื่อสำเร็จ
    };

    return (
        <AuthenticatedLayout> {/* ใช้ Layout สำหรับหน้าที่ผู้ใช้ล็อกอิน */}
            <Head title="Chirps" /> {/* ตั้งชื่อแท็บของหน้าเป็น "Chirps" */}

            <div className="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8"> {/* Container สำหรับฟอร์มและรายการ Chirps */}
                <form onSubmit={submit}> {/* ฟอร์มสำหรับโพสต์ข้อความใหม่ */}
                    <textarea
                        value={data.message} // ผูกค่า textarea กับ state `data.message`
                        placeholder="What's on your mind?" // ข้อความตัวอย่างในช่อง
                        className="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" // การตั้งค่า CSS
                        onChange={e => setData('message', e.target.value)} // อัปเดตค่าใน state เมื่อมีการเปลี่ยนแปลง
                    ></textarea>
                    <InputError message={errors.message} className="mt-2" /> {/* แสดงข้อผิดพลาดถ้ามี */}
                    <PrimaryButton className="mt-4" disabled={processing}>Chirp</PrimaryButton> {/* ปุ่มสำหรับโพสต์ข้อความ */}
                </form>
                <div className="mt-6 bg-white shadow-sm rounded-lg divide-y"> {/* Container สำหรับแสดงรายการ Chirps */}
                    {chirps.map(chirp => // วนลูปผ่าน chirps เพื่อแสดงแต่ละรายการ
                        <Chirp key={chirp.id} chirp={chirp} /> // ใช้ Component Chirp แสดงรายละเอียดของ Chirp
                    )}
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
