<x-app-layout>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Kolom Gambar -->
                <div class="md:col-span-2 flex flex-col gap-6">
                    <div class="rounded-xl overflow-hidden shadow-lg">
                        <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=80"
                             alt="Pantai Senja"
                             class="w-full h-64 object-cover object-center" />
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="rounded-xl overflow-hidden shadow">
                            <img src="https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=400&q=80"
                                 alt="Pantai"
                                 class="w-full h-32 object-cover object-center" />
                        </div>
                        <div class="rounded-xl overflow-hidden shadow">
                            <img src="https://images.unsplash.com/photo-1502082553048-f009c37129b9?auto=format&fit=crop&w=400&q=80"
                                 alt="Senja"
                                 class="w-full h-32 object-cover object-center" />
                        </div>
                    </div>
                </div>
                <!-- Kolom Card Informasi -->
                <div class="flex flex-col gap-6">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                        <h3 class="text-lg font-semibold text-orange-700 dark:text-orange-300 mb-2">Selamat Datang!</h3>
                        <p class="text-gray-700 dark:text-gray-200">
                            Ini adalah dashboard Senja Beach. Nikmati suasana pantai dan fitur-fitur menarik yang kami sediakan.
                        </p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                        <h3 class="text-lg font-semibold text-orange-700 dark:text-orange-300 mb-2">Info Cuaca</h3>
                        <p class="text-gray-700 dark:text-gray-200">
                            🌤️ Senja hari ini cerah, cocok untuk menikmati pantai!
                        </p>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                        <h3 class="text-lg font-semibold text-orange-700 dark:text-orange-300 mb-2">Tips Liburan</h3>
                        <ul class="list-disc list-inside text-gray-700 dark:text-gray-200">
                            <li>Bawa sunblock dan kacamata hitam</li>
                            <li>Jangan lupa minum air putih</li>
                            <li>Abadikan momen senja dengan kamera 📸</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
