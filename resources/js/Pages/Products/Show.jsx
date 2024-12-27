import { Link } from '@inertiajs/react';

export default function Show({ product }) {
    return (
        <div className="min-h-screen bg-gradient-to-b from-pink-100 to-pink-50 py-10 px-4 flex items-center justify-center">
            <div className="bg-white border border-gray-300 rounded-xl shadow-2xl p-8 w-full max-w-3xl">
                <img
                    src={product.image}
                    alt={product.name}
                    className="w-full h-72 object-cover rounded-lg mb-8 transition transform hover:scale-105"
                />
                <h1 className="text-4xl font-extrabold text-gray-900 mb-4 tracking-tight">
                    {product.name}
                </h1>
                <p className="text-gray-700 text-lg leading-relaxed mb-6">
                    {product.description}
                </p>
                <p className="text-2xl font-bold text-pink-600 mb-8">
                    ราคา: ฿{product.price.toLocaleString()} บาท
                </p>
                <div className="text-center">
                    <Link
                        href="/products"
                        className="inline-block bg-pink-600 text-white font-medium py-3 px-8 rounded-lg hover:bg-pink-500 shadow-md transition"
                    >
                        กลับไปยังหน้าสินค้า
                    </Link>
                </div>
            </div>
        </div>
    );
}
