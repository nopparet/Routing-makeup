import { Link } from '@inertiajs/react';

export default function Index({ products }) {
    return (
        <div className="min-h-screen bg-gradient-to-b from-pink-100 to-pink-50 py-10 px-4">
    <h1 className="text-5xl font-bold text-gray-800 text-center mb-10 tracking-wide flex items-center justify-center">
        <span>Cosmetic Products</span>
        <span className="ml-4 text-pink-500 animate-pulse">❤️</span>
    </h1>
            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                {products.map((product) => (
                    <div
                        key={product.id}
                        className="bg-white border border-gray-300 rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105"
                    >
                        <img
                            src={product.image}
                            alt={product.name}
                            className="w-full h-52 object-cover rounded-t-lg"
                        />
                        <div className="p-5">
                            <h2 className="text-xl font-semibold text-gray-900 mb-2">
                                {product.name}
                            </h2>
                            <p className="text-gray-600 text-base mb-4">
                                ${product.price.toFixed(2)}
                            </p>
                            <Link
                                href={`/products/${product.id}`}
                                className="block w-full text-center py-2 text-sm font-medium text-white bg-pink-600 rounded-lg hover:bg-pink-500 transition"
                            >
                                ดูรายละเอียดสินค้า
                            </Link>
                        </div>
                    </div>
                ))}
            </div>
        </div>
    );
}
