@extends('user.home')

@section('content')
    <div class="max-w-md mx-auto mt-4">
        <h2 class="text-2xl font-bold mb-4">تعديل بيانات المستخدم</h2>

        <form action="{{ route('user.profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block font-medium mb-1">الاسم</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                       class="input-field">
                @error('name')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block font-medium mb-1">البريد الإلكتروني</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                       class="input-field">
                @error('email')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="proof_number" class="block font-medium mb-1">رقم الاثبات</label>
                <input type="text" id="proof_number" name="proof_number" value="{{ old('proof_number', $user->proof_number) }}"
                       class="input-field">
                @error('proof_number')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="type" class="block font-medium mb-1">نوع المستخدم</label>
                <input type="text" id="type" name="type" value="{{ old('type', $user->type) }}"
                       class="input-field">
                @error('type')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="college" class="block font-medium mb-1">الكلية</label>
                <input type="text" id="college" name="college" value="{{ old('college', $user->college) }}"
                       class="input-field">
                @error('college')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="phone" class="block font-medium mb-1">رقم المستخدم</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"
                       class="input-field">
                @error('phone')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="address" class="block font-medium mb-1">عنوان المستخدم</label>
                <input type="text" id="address" name="address" value="{{ old('address', $user->address) }}"
                       class="input-field">
                @error('address')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="blood_type" class="block font-medium mb-1">فصيلة الدم</label>
                <input type="text" id="blood_type" name="blood_type" value="{{ old('blood_type', $user->blood_type) }}"
                       class="input-field">
                @error('blood_type')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6">
                <button type="submit" class="submit-button">
                    حفظ التغييرات
                </button>
            </div>
        </form>
    </div>

    <style>
        .input-field {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 0.25rem;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .input-field:focus {
            border-color#3490dc;
        }

        .error-message {
            color: red;
            margin-top: 0.25rem;
        }

        .submit-button {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #3490dc;
            color: #fff;
            border: none;
            border-radius: 0.25rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-button:hover {
            background-color: #2779bd;
        }
    </style>
@endsection
