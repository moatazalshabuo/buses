<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>معلومات المستخدم</title>
</head>
<body>

    <div class="max-w-2xl overflow-hidden bg-white shadow sm:rounded-lg">
        <div class="px-4 py-3 sm:px-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900">
               بيانات المستخدم
            </h3>
            {{-- <p class="max-w-2xl mt-1 text-sm text-gray-500">
                Details and informations about user.
            </p> --}}
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="px-4 py-4 bg-gray-200 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                       الاسم
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $user->name }}                    </dd>
                </div>
                <div class="px-4 py-4 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        الايميل
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $user->email }}
                    </dd>
                </div>
                <div class="px-4 py-4 bg-gray-200 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                       الصفة
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $user->type }}

                    </dd>
                </div>
                <div class="px-4 py-4 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        رقم القييد
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $user->proof_number }}
                    </dd>
                </div>
                <div class="px-4 py-4 bg-gray-200 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        العنوان
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $user->address }}
                    </dd>
                </div>
                <div class="px-4 py-4 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        رقم الهاتف
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $user->phone }}
                    </dd>
                </div>
                <div class="px-4 py-4 bg-gray-200 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        الكلية
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $user->college }}
                    </dd>
                </div>
                <div class="px-4 py-4 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        فصيلة الدم
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $user->blood_type }}
                    </dd>
                </div>
                {{-- <div class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        About
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        To get social media testimonials like these, keep your customers engaged with your social media accounts by posting regularly yourself
                    </dd>
                </div> --}}
            </dl>
        </div>
    </div>
</body>
</html>
