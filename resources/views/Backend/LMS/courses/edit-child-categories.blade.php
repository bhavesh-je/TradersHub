<input class="form-check-input" type="checkbox" id="cat_id-{{ $child_category->id }}" name="cat_id[]" value="{{ $child_category->id }}" @if(!empty($course->cat_id) && $course->cat_id != "null") @if(in_array($child_category->id, json_decode($course->cat_id))) checked @endif @endif> <label for="cat_id-{{ $child_category->id }}">{{ $child_category->c_c_name }}</label>
@if ($child_category->CourseCategories)
    <ul>
        @foreach ($child_category->CourseCategories as $childCategory)
            @include('Backend.LMS.courses.edit-child-categories', ['child_category' => $childCategory])
        @endforeach
    </ul>
@endif