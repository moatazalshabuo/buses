<div class="flex h-screen">
    <div class="w-48 bg-white shadow-md">
        <a class="flex items-center px-4 py-2 mt-2 text-gray-600 transition-colors duration-300 transform rounded-md hover:bg-gray-100 hover:text-gray-700" href="{{ route('admin.dashboard') }}">
            <i class="w-6 h-6 text-gray-600 fas fa-home"></i>
            <span class="mx-3 font-medium">الرئيسية</span>
        </a>
        <a class="flex items-center px-4 py-2 mt-2 text-gray-600 transition-colors duration-300 transform rounded-md hover:bg-gray-100 hover:text-gray-700" href="{{ route('buses.index') }}">
            <i class="w-6 h-6 text-gray-600 fas fa-bus"></i>
            <span class="mx-3 font-medium">الحافلات</span>
        </a>
        <a class="flex items-center px-4 py-2 mt-2 text-gray-600 transition-colors duration-300 transform rounded-md hover:bg-gray-100 hover:text-gray-700" href="{{ route('route.index') }}">
            <i class="w-6 h-6 text-gray-600 fas fa-route"></i>
            <span class="mx-3 font-medium">خطوط السير</span>
        </a>
        <a class="flex items-center px-4 py-2 mt-2 text-gray-600 transition-colors duration-300 transform rounded-md hover:bg-gray-100 hover:text-gray-700" href="{{ route('routetime.index') }}">
            <i class="w-6 h-6 text-gray-600 fas fa-clock"></i>
            <span class="mx-3 font-medium">مواعيد خطوط السير</span>
        </a>

        @if(auth()->user() instanceof App\Models\Admin && auth()->user()->isAdmin())
        <a class="flex items-center px-4 py-2 mt-2 text-gray-600 transition-colors duration-300 transform rounded-md hover:bg-gray-100 hover:text-gray-700" href="{{ route('sub.admins') }}">
            <i class="w-6 h-6 text-gray-600 fas fa-user"></i>
            <span class="mx-3 font-medium">مسؤولين</span>
        </a>
    @endif

        <a class="flex items-center px-4 py-2 mt-2 text-gray-600 transition-colors duration-300 transform rounded-md hover:bg-gray-100 hover:text-gray-700" href="{{ route('admin.users.index') }}">
            <i class="w-6 h-6 text-gray-600 fas fa-users"></i>
            <span class="mx-3 font-medium">المستخدمين</span>
        </a>
        <a class="flex items-center px-4 py-2 mt-2 text-gray-600 transition-colors duration-300 transform rounded-md hover:bg-gray-100 hover:text-gray-700" href="{{ route('admin.logout') }}">
            <i class="w-6 h-6 text-gray-600 fas fa-sign-out-alt"></i>
            <span class="mx-3 font-medium">تسجيل الخروج</span>
        </a>
    </div>
</div>
