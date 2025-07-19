<x-app-layout>
    <div class="max-w-xl mx-auto py-10">
        <h2 class="text-2xl font-bold mb-6 text-pink-500">Pengaturan Tema</h2>
        <form method="POST" action="{{ route('settings.theme.update') }}" class="space-y-4">
            @csrf
            <div>
                <label class="font-semibold">Pilih Tema:</label>
                <div class="flex gap-4 mt-2">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="theme" value="pink" {{ $user->theme === 'pink' ? 'checked' : '' }}>
                        <span class="w-6 h-6 rounded-full bg-pink-400 border-2 border-pink-600"></span> Pink Lucu
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="theme" value="blue" {{ $user->theme === 'blue' ? 'checked' : '' }}>
                        <span class="w-6 h-6 rounded-full bg-blue-400 border-2 border-blue-600"></span> Blue
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="theme" value="dark" {{ $user->theme === 'dark' ? 'checked' : '' }}>
                        <span class="w-6 h-6 rounded-full bg-gray-800 border-2 border-gray-600"></span> Dark
                    </label>
                </div>
                @error('theme')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="px-4 py-2 bg-pink-500 text-white rounded shadow hover:bg-pink-600">Simpan</button>
        </form>
    </div>
</x-app-layout>