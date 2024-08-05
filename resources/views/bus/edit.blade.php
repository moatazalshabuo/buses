@extends('home')
@section('content')
<div class="container">
    <h2>تعديل بيانات الحافلة</h2>

    <form method="POST" action="{{ route('buses.update', $bus->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">الاسم</label>
            <input type="text" class="form-control" id="name" name="name_bus" value="{{ $bus->name_bus }}" required>
        </div>
        <div class="form-group">
            <label for="plate_number">لوحة الترخيص</label>
            <input type="text" class="form-control" id="plate_number" name="plate_number" value="{{ $bus->plate_number }}" required>
        </div>
        <div class="form-group">

            <label for="seats">عدد المقاعد</label>
            <input type="number" class="form-control" id="seats" name="seats" value="{{ $bus->seats }}" required>
        </div>
        <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
</div>
@endsection
