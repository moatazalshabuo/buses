<nav class="bg-white border-gray-200 dark:bg-gray-900">
  <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
      <a href="https://flowbite.com" class="flex items-center space-x-3 rtl:space-x-reverse">
          <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">النقل الطلابي</span>
      </a>
      <div class="flex items-center space-x-6 rtl:space-x-reverse">
          <a href="tel:5541251234" class="text-sm text-gray-500 dark:text-white hover:underline">(555) 412-1234</a>

          <a href="{{ route('user.logout') }}" class="text-sm text-blue-600 dark:text-blue-500 hover:underline">تسجيل الخروج</a>
      </div>
  </div>
  </nav>

    <nav class="bg-white dark:bg-gray-700">
      <div class="max-w-screen-xl px-4 py-3 mx-auto">
        <div class="flex items-center justify-center">
          <ul class="flex flex-row mt-0 space-x-8 text-sm font-medium rtl:space-x-reverse">
            <li>
              <a href="{{ route('user.dashboard') }}" class="text-gray-900 dark:text-white hover:underline" aria-current="page">الرئيسية</a>
            </li>
            <li>
              <a href="{{ route('user.routes.index') }}" class="text-gray-900 dark:text-white hover:underline">خطوط السير</a>
            </li>
            <li>
              <a href="{{ route('reservations.create') }}" class="text-gray-900 dark:text-white hover:underline">حجز</a>
            </li>
            <li>
              <a href="{{ route('reservations.index') }}" class="text-gray-900 dark:text-white hover:underline">حجوزاتي</a>
            </li>
            <li>
              <a href="{{ route('map') }}" class="text-gray-900 dark:text-white hover:underline">الخريطة</a>
            </li>
            <li>
              <a href="{{ route('user.profile.edit') }}" class="text-gray-900 dark:text-white hover:underline">الملف الشخصي</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

