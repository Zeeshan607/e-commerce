
<option value="{{ $childCategory->id }}" @if( isset($product) && $product->category_id == $childCategory->id ) selected @endif>
{{ str_repeat('--', $level) }} {{ $childCategory->name }}
</option>
@if ($childCategory->children)
    @foreach ($childCategory->children as $child)
        @include('admin.sidebar.categories.child_option', ['childCategory' => $child, 'level' => $level + 1])
    @endforeach
@endif
