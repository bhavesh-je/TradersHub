<input class="form-check-input" type="checkbox" id="cat_id-{{ $child_category->id }}" name="cat_id[]" value="{{ $child_category->id }}"> <label for="cat_id-{{ $child_category->id }}">{{ $child_category->c_c_name }}</label>
@if ($child_category->CourseCategories)
    <ul>
        @foreach ($child_category->CourseCategories as $childCategory)
            @include('LMS.course-categories.child-categories', ['child_category' => $childCategory])
        @endforeach
    </ul>
@endif